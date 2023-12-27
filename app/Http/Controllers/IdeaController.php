<?php

namespace App\Http\Controllers;

use App\Models\Idea;

use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index(Request $request)
{
    $userId = auth()->id();
    $criteria = $request->get('criteria', 'id'); 

    if ($userId == 1) {
        $criteria = $request->get('criteria', 'vista');
        $ideas = Idea::orderBy($criteria, 'asc')->get();
    } else {
        $ideas = Idea::orderBy($criteria, 'asc')->get();
    }

    return view('ideas.index', ['ideas' => $ideas]);
}


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:30',
            'descripcion' => 'required|string',
            'tematica' => 'required|string',
        ]);

        $creador = auth()->user()->username;
        $anonimo = $request->has('anonimo') ? 'S' : 'N';

        $idea = Idea::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'tematica' => $request->input('tematica'),
            'creador' => $creador,
            'vista' => 'N',
            'anonimo' => $anonimo,
        ]);
        return redirect()->route('idea.index')->with('success', 'Idea almacenada exitosamente');
    }


    public function update(Idea $idea)
    {
        $idea->update(['vista' => 'S']);

        return redirect()->back()->with('success', 'Vista updated successfully');
    }
}