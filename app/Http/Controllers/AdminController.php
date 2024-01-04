<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');

    }
    public function edit()
    {

        return view('admin.edit');

    }
    public function editUser($id)
    {
        $user = User::find($id); // Lógica para obtener el usuario según el $id, por ejemplo, User::find($id);

        return view('admin.edit-user', ['user' => $user]);
    }



    public function exportDB()
    {
        //$comando = 'export PGPASSWORD=password; pg_dump -h 127.0.0.1 -E UTF8 -p 5432 -U sail bd_proyecto > backups/bd_proyecto.sql';

        $backupFileName = 'backup_' . date('YmdHis') . '.sql';
        $command = [
            'export',
            'PGPASSWORD=password;',
            'pg_dump',
            '-U',
            config('database.connections.pgsql.username'),
            '-h',
            config('database.connections.pgsql.host'),
            '-p',
            '5432',
            'bd_proyecto',
            '>',
            '.bd_proyecto.sql',
        ];


        // Ejecutar el comando
        $process = new Process($command);
        $process->run();

        // Verificar si el comando se ejecutó correctamente
        if ($process->isSuccessful()) {
            // Descargar el archivo de respaldo
            return response()->download(storage_path('app/' . $backupFileName))->deleteFileAfterSend(true);
        } else {
            // Manejar el caso en que el comando falla
            return response()->json(['error' => 'Error al exportar la base de datos'], 500);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
        return redirect()->route('admin.index')->with('success', 'Usuario creado con éxito');
    }


    public function destroy($id)
    {

        $user = User::find($id);

        if (auth()->id() === 1) {
            $user->delete();
            return redirect()->route('admin.edit')->with('success', 'Usuario eliminado exitosamente.');
        } else {
            return redirect()->route('admin.edit')->with('error', 'No tienes permisos para eliminar a este usuario.');
        }
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = User::when($request->search, function ($query) use ($request) {
                return $query->where('id', 'like', '%' . $request->search . '%')
                    ->orWhere('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            })->get();

            if (count($data) > 0) {
                $output = view('components.users-table', ['data' => $data])->render();
            } else {
                $output = 'No results';
            }

            return $output;
        }
    }
}