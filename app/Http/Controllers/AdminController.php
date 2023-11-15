<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\Process\Process;

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
        return redirect()->route('admin.index')
            ->with('success', 'Usuario creado con éxito');
    }


    public function destroy(User $user)
    {
        if (auth()->id() === 1) {
            $user->delete();

            return redirect()->back()->with('success', 'Usuario eliminado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'No tienes permisos para eliminar a este usuario.');
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

            $output = '';
            if (count($data) > 0) {
                $output = '
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>';
                foreach ($data as $row) {
                    $output .= '
                                <tr>
                                    <th scope="row">' . $row->id . '</th>
                                    <td>' . $row->name . '</td>
                                    <td>' . $row->email . '</td>
                                    <td><a href="' . route('dashboard') . '"><x-secondary-button class="ml-3"><i class="fa fa-pencil"></i></x-secondary-button></a></td>
                                    <td>
                                            <x-danger-button class="ml-3">
                                                {{ __("Delete") }}
                                            </x-danger-button>
                                    </td>
                                </tr>';
                }

                $output .= '
                        </tbody>
                    </table>';
            } else {
                $output = 'No results';
            }

            return $output;
        }
    }
}