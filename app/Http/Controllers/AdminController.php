<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
    public function updateUser(Request $request, $id)
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Usuario actualizado con éxito' : 'User updated successfully';
        $errorMessage = ($locale === 'es') ? 'El usuario no se pudo actualizar correctamente' : 'User could not be updated';

        $user = User::findOrFail($id);

        // Validación de datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        
        try {
            // Actualizar datos del usuario
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('success', $errorMessage);
        }

        return redirect()->route('admin.editUser', $id)->with('success', $successMessage);
    }

    public function store(Request $request)
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Usuario creado con éxito' : 'User created successfully';
        $errorMessage = ($locale === 'es') ? 'El usuario no se pudo crear correctamente' : 'User could not be created';
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
        ]);

        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('success', $errorMessage);
        }

        return redirect(route('balance.index'))->with('success', $successMessage);
    }

    public function destroy(Request $request, $id)
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Usuario eliminado con éxito' : 'User deleted successfully';
        $user = User::find($id);

        if (auth()->id() === 1) {
            $user->delete();
            return redirect()->route('admin.edit')->with('success', $successMessage);
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
            })->orderBy('id')->get();

            if (count($data) > 0) {
                $output = view('components.users-table', ['data' => $data])->render();
            } else {
                $output = 'No results';
            }
            return $output;
        }
    }
}
