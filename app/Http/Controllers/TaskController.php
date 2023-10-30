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

    public function joinGroup(Task $task)
    {
        $user = Auth::user();
        $responsables = $task->responsables;

        // Comprueba si el campo está vacío o no contiene el nombre de usuario
        if (empty($responsables) || strpos($responsables, $user->username) === false) {
            // Agrega el nombre de usuario separado por coma
            $responsables = ($responsables) ? $responsables . ', ' . $user->username : $user->username;

            $task->responsables = $responsables;
            $task->save(); // Guarda el modelo Task actualizado

            // Redirige a donde desees después de unirse al grupo
            return redirect()->back()->with('success', 'Te has unido al grupo exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Ya eres parte de este grupo.');
        }
    }

    public function leaveGroup(Task $task)
    {
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
        return redirect()->back()->with('success', 'Has abandonado el grupo exitosamente.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'dificultad' => 'required',
        ]);

        // Comprueba si el campo 'responsables' está vacío y cámbialo a una cadena vacía
        $responsables = $request->input('responsables', ''); // Si no se ingresa, se asigna una cadena vacía

        // Crea una nueva tarea con los datos ingresados
        Task::create([
            'descripcion' => $request->input('descripcion'),
            'dificultad' => $request->input('dificultad'),
            'responsables' => $responsables,
        ]);

        return redirect()->route('task.index')
            ->with('success', 'Tarea creada con éxito');
    }
    public function destroy(Task $task)
    {
        // Verifica si el usuario autenticado tiene permisos para eliminar la tarea (por ejemplo, si es el creador de la tarea).
        if (auth()->id() === 1) {
            // Elimina la tarea de la base de datos.
            $task->delete();

            return redirect()->back()->with('success', 'Tarea eliminada exitosamente.');
        } else {
            return redirect()->back()->with('error', 'No tienes permisos para eliminar esta tarea.');
        }
    }


}