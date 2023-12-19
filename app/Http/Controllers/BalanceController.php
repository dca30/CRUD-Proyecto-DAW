<?php

namespace App\Http\Controllers;

use App\Charts\PieChartGastos;
use App\Charts\PieChartIngresos;
use App\Charts\TicketsBarChart;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\Ticket;

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
            'fechas' => 'required|integer|digits:4',

        ]);
        $data['gasto_premios'] = -abs($data['gasto_premios']);
        $data['gasto_tickets'] = -abs($data['gasto_tickets']);
        $data['gasto_c_b'] = -abs($data['gasto_c_b']);
        $data['gasto_disco'] = -abs($data['gasto_disco']);
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
            'fechas' => 'required|integer|digits:4',
        ]);
        // Aplicar el valor absoluto y el signo negativo a los campos de gasto
        $data['gasto_premios'] = -abs($data['gasto_premios']);
        $data['gasto_tickets'] = -abs($data['gasto_tickets']);
        $data['gasto_c_b'] = -abs($data['gasto_c_b']);
        $data['gasto_disco'] = -abs($data['gasto_disco']);
        $balance->update($data);

        return redirect(route('balance.index'))->with('success', 'Balance Updated Succesffully');

    }
    public function chart(BalanceTotalChart $chart)
    {
        $balanceData = DB::table('balances') /*->select('total', 'year')*/->orderBy('year', 'asc')->get();
        $total = $balanceData->pluck('total');
        $years = $balanceData->pluck('year')->unique();
        $ingreso_c_b = $balanceData->pluck('ingreso_c_b');
        $ingreso_aso = $balanceData->pluck('ingreso_aso');
        $gasto_premios = $balanceData->pluck('gasto_premios');
        $gasto_tickets = $balanceData->pluck('gasto_tickets');
        $gasto_c_b = $balanceData->pluck('gasto_c_b');
        $gasto_disco = $balanceData->pluck('gasto_disco');

        return view('balances.chart', ['chart' => $chart->build($total, $years, $ingreso_c_b, $ingreso_aso, $gasto_premios, $gasto_tickets, $gasto_c_b, $gasto_disco)]);
    }

    /*public function chartDisco(BalanceTotalChart $chart)
    {
        $balanceData = DB::table('balances')->select('gasto_disco', 'year')->orderBy('year', 'asc')->get();
        $disco = $balanceData->pluck('gasto_disco');
        $years = $balanceData->pluck('year')->unique();

        return view('balances.chart', ['chart' => $chart->build($disco, $years)]);
    }*/
    public function infoChart(Balance $balance, PieChartIngresos $chart1, PieChartGastos $chart2, TicketsBarChart $chart3)
    {
        /*$ticket = Ticket::where('year', $balance->year)->get();
        $ticket = DB::table('tickets')->where('year', $balance->year)->get();*/
        $ticket = Ticket::where('year', $balance->year)->first();
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
        $labelsIngresos = ['Bebida Beneficio', 'Aporte Asociacion']; //Añadir beneficio bingo

        $labelsGastos = ['Premios', 'Tickets', 'Bebida', 'Discomovil'];

        return view('balances.info', [
            'balance' => $balance,
            'ticket' => $ticket,
            'chart1' => $chart1->build($ingresos, $labelsIngresos),
            'chart2' => $chart2->build($gastos, $labelsGastos),
            'chart3' => $chart3->build($ticket),
        ]);
    }

    /*public function info(Balance $balance)
    {
        return view('balances.info', ['balance' => $balance]);
    }*/
    public function ticket(Balance $balance, TicketsBarChart $chart)
    {
        $ticket = Ticket::where('year', $balance->year)->first();
        return view('balances.ticket', [
            'ticket' => $ticket,
            'chart3' => $chart->build($ticket),
        ]);
    }
}