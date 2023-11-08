<?php

namespace App\Http\Controllers;
use App\Charts\LineChartFloating;
use Illuminate\Http\Request;

use App\Models\Balance;

class DashboardController extends Controller
{
    public function index(LineChartFloating $chart){
        $balances = Balance::orderBy('year','desc')->get();

        $total = $balances->pluck('total')->take(10)->toArray();

        return view('dashboard', 
            compact('balances',),
            ['chart' => $chart->build($total)]);
    }
}