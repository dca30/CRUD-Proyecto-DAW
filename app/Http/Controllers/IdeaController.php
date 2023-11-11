<?php

namespace App\Http\Controllers;

use App\Models\Idea;

use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        if ($userId == 1) {
            $ideas = Idea::orderByDesc('vista')->orderBy('id', 'asc')->get();
        } else {
            $ideas = Idea::orderBy('id', 'asc')->get();
        }

        return view('ideas.index', ['ideas' => $ideas]);
    }
    public function store(Request $request)
    {
        // ... tu código existente para la validación y almacenamiento de la tarea
    
        $anonimo = $request->has('anonimo'); // Verifica si el checkbox está marcado
    
        // Almacena la tarea con la información del checkbox
        Task::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'dificultad' => $request->dificultad,
            'anonimo' => $anonimo,
        ]);
    
        // Resto de tu código de redirección o respuesta
    }
    

    public function update(Idea $idea)
    {
        $idea->update(['vista' => 0]);

        return redirect()->back()->with('success', 'Vista updated successfully');
    }
}