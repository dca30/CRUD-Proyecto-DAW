<?php

namespace App\Http\Controllers;

use App\Models\Idea;

use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::all();
        return view('ideas.index', ['ideas' => $ideas]);
    }
    public function updateVista(Idea $idea)
    {
        // Asegúrate de tener la lógica adecuada para verificar permisos u otras condiciones antes de actualizar
        $idea->update(['vista' => 0]);

        return redirect()->back()->with('success', 'Vista updated successfully');
    }
}