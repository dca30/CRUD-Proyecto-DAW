<?php

namespace App\Http\Controllers;
use App\Models\Idea;

use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index(){
        //$members = Member::all();
    return view('ideas.index'/*, ['members' => $members]*/);
    }
}

