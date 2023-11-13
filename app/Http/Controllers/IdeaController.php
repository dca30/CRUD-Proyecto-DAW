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
        


        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'tematica' => 'required',
            'creador' => 'required',
            'vista' => 'required',
            'anonimo'=> 'required',
        ]);

        // Crea una nueva tarea con los datos ingresados y el campo 'responsables' vacío
        Idea::create([
            'titulo' => 'Test',
            'descripcion' => 'Esto es un test',
            'tematica' => 'A',
            'creador' => 'user',
            'vista' => true,
            // Cambiado 'f' a true
            'anonimo' => "",
            // Usar has para verificar si está presente
        ]);

        return redirect()->route('idea.index')
            ->with('success', 'Idea creada con éxito');
    }



    public function update(Idea $idea)
    {
        $idea->update(['vista' => 0]);

        return redirect()->back()->with('success', 'Vista updated successfully');
    }
}