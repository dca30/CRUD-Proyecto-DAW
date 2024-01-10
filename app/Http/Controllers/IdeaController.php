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
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Idea almacenada exitosamente' : 'Idea stored succesffully';
        $errorMessage = ($locale === 'es') ? 'La idea no se pudo almacenar' : 'Idea could not be created';

        $request->validate([
            'titulo' => 'required|string|max:30',
            'descripcion' => 'required|string',
            'tematica' => 'required|string',
        ]);

        $creador = auth()->user()->username;
        $anonimo = $request->has('anonimo') ? 'S' : 'N';

        try {
            $idea = Idea::create([
                'titulo' => $request->input('titulo'),
                'descripcion' => $request->input('descripcion'),
                'tematica' => $request->input('tematica'),
                'creador' => $creador,
                'vista' => 'N',
                'anonimo' => $anonimo,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('success', $errorMessage);
        }
        return redirect()->route('idea.index')->with('success', $successMessage);
    }


    public function update(Request $request, Idea $idea)
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Idea marcada como vista' : 'Idea checked as seen';
        $idea->update(['vista' => 'S']);

        return redirect()->back()->with('success', $successMessage);
    }
}