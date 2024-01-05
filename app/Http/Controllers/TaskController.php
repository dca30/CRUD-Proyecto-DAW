<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'asc')->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function joinGroup(Request $request, Task $task)
    {
        $user = Auth::user();
        $responsables = $task->responsables;

        // Comprueba si el campo está vacío o no contiene el nombre de usuario
        if (empty($responsables) || strpos($responsables, $user->username) === false) {
            $locale = $request->session()->get('locale');
            $successMessage = ($locale === 'es') ? 'Te has unido al grupo con exito' : 'You joined the group succesfully';
            // Agrega el nombre de usuario separado por coma
            $responsables = ($responsables) ? $responsables . ', ' . $user->username : $user->username;

            $task->responsables = $responsables;
            $task->save(); // Guarda el modelo Task actualizado

            // Redirige a donde desees después de unirse al grupo
            return redirect()->back()->with('success', $successMessage);
        } else {
            return redirect()->back()->with('error', 'Ya eres parte de este grupo.');
        }
    }

    public function leaveGroup(Request $request, Task $task)
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Has abandonado el grupo con éxito' : 'You left the group succesfully';
        $user = Auth::user();
        $responsables = $task->responsables;

        $listaResponsables = explode(', ', $responsables);

        // Busca y elimina el nombre de usuario de la lista
        $index = array_search($user->username, $listaResponsables);
        if ($index !== false) {
            unset($listaResponsables[$index]);
        }

        // Vuelve a unir la lista en una cadena separada por comas
        $nuevaResponsables = implode(', ', $listaResponsables);

        $task->responsables = $nuevaResponsables;
        $task->save(); // Guarda el modelo Task actualizado

        // Redirige a donde desees después de abandonar el grupo
        return redirect()->back()->with('success', $successMessage);
    }
    public function store(Request $request)
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Tarea creada con éxito' : 'Task created succesfully';
        $request->validate([
            'descripcion' => 'required',
            'dificultad' => 'required',
        ]);

        // Crea una nueva tarea con los datos ingresados y el campo 'responsables' vacío

        try {
            Task::create([
                'descripcion' => $request->input('descripcion'),
                'dificultad' => $request->input('dificultad'),
                'responsables' => '',
                // Cadena vacía por defecto
            ]);
        } catch (\Exception $e) {
            // Si hay un error al intentar crear el balance, maneja el error aquí
            return redirect()->route('task.index')->with('error', 'Hola');
        }
        return redirect()->route('task.index')->with('success', $successMessage);
    }


    public function destroy(Request $request, Task $task)
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Tarea eliminada con éxito' : 'Task deleted succesfully';
        // Verifica si el usuario autenticado tiene permisos para eliminar la tarea (por ejemplo, si es el creador de la tarea).
        if (auth()->id() === 1) {
            // Elimina la tarea de la base de datos.
            $task->delete();

            return redirect()->back()->with('success', $successMessage);
        } else {
            return redirect()->back()->with('error', 'No tienes permisos para eliminar esta tarea.');
        }
    }


}