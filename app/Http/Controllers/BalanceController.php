<?php

namespace App\Http\Controllers;

use App\Charts\PieChart;
use Illuminate\Http\Request;
use App\Models\Balance;

use App\Charts\BalanceTotalChart;
use Illuminate\Support\Facades\DB;



class BalanceController extends Controller
{
    public function index()
    {
        $balances = Balance::orderBy('year', 'desc')->get();
        return view('balances.index', ['balances' => $balances]);

    }


    public function create()
    {
        return view('balances.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'ingreso_c_b' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_aso' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_premios' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_tickets' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_c_b' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_disco' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'year' => 'required|integer|digits:4',

        ]);

        $newBalance = Balance::create($data);

        return redirect(route('balance.index'));

    }

    public function edit(Balance $balance)
    {
        if (auth()->id() === 1) {
            return view('balances.edit', ['balance' => $balance]);
        } else {
            abort(403);
        }
    }

    public function update(Balance $balance, Request $request)
    {
        $data = $request->validate([
            'ingreso_c_b' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_aso' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_premios' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_tickets' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_c_b' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_disco' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'year' => 'required|integer|digits:4',
        ]);

        $balance->update($data);

        return redirect(route('balance.index'))->with('success', 'Balance Updated Succesffully');

    }
    public function chart(BalanceTotalChart $chart)
    {
        $balanceData = DB::table('balances')->select('total', 'year')->orderBy('year', 'asc')->get();
        $totals = $balanceData->pluck('total');
        $years = $balanceData->pluck('year')->unique();

        return view('balances.chart', ['chart' => $chart->build($totals, $years)]);
    }

    public function chartDisco(BalanceTotalChart $chart)
    {
        $balanceData = DB::table('balances')->select('gasto_disco', 'year')->orderBy('year', 'asc')->get();
        $disco = $balanceData->pluck('gasto_disco');
        $years = $balanceData->pluck('year')->unique();

        return view('balances.chart', ['chart' => $chart->build($disco, $years)]);
    }
    public function infoChart(Balance $balance, PieChart $chart1, PieChart $chart2)
    {
        $gastos = [
            abs($balance->gasto_premios),
            abs($balance->gasto_tickets),
            abs($balance->gasto_c_b),
            abs($balance->gasto_disco),
        ];

        $ingresos = [
            abs($balance->ingreso_c_b),
            abs($balance->ingreso_aso),
        ];

        $labelsGastos = ['Premios', 'Tickets', 'Bebida', 'Discomovil'];
        $labelsIngresos = ['Bebida Beneficio', 'Aporte Asociacion'];

        return view('balances.info', [
            'balance' => $balance,
            'chart1' => $chart1->build($gastos, $labelsGastos),
            'chart2' => $chart2->build($ingresos, $labelsIngresos),
        ]);
    }

    /*public function info(Balance $balance)
    {
        return view('balances.info', ['balance' => $balance]);
    }*/
}