<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Balance;

class DashboardController extends Controller
{
    public function index(){
        $balances = Balance::orderBy('year','desc')->get();
        return view('dashboard', compact('balances'));
    }
}