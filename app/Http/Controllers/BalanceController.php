<?php

namespace App\Http\Controllers;

use App\Charts\BalanceTotalChart;
use App\Charts\PieChartGastos;
use App\Charts\PieChartIngresos;
use App\Charts\TicketsBarChart;
use App\Models\Balance;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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

    public function createTicket(Request $request, $year)
    {
        return view('balances.create-ticket', ['year' => $year]);
    }

    public function storeTicket(Request $request)
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Ticket creado con éxito' : 'Balance created succesffully';

        $data = $request->validate([
            'tickets_totales_cubata' => 'required|integer|digits_between:1,5',
            'tickets_vendidos_cubata' => 'required|integer|digits_between:1,5',
            'precio_ticket_cubata' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'tickets_totales_cerveza' => 'required|integer|digits_between:1,5',
            'tickets_vendidos_cerveza' => 'required|integer|digits_between:1,5',
            'precio_ticket_cerveza' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'tickets_totales_agua_refresco' => 'required|integer|digits_between:1,5',
            'tickets_vendidos_agua_refresco' => 'required|integer|digits_between:1,5',
            'precio_ticket_agua_refresco' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'tickets_totales_bocadillo' => 'required|integer|digits_between:1,5',
            'tickets_vendidos_bocadillo' => 'required|integer|digits_between:1,5',
            'precio_ticket_bocadillo' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'tickets_totales_copa' => 'required|integer|digits_between:1,5',
            'tickets_vendidos_copa' => 'required|integer|digits_between:1,5',
            'precio_ticket_copa' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'tickets_totales_litro_cerveza' => 'required|integer|digits_between:1,5',
            'tickets_vendidos_litro_cerveza' => 'required|integer|digits_between:1,5',
            'precio_ticket_litro_cerveza' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'year' => 'required|integer|digits:4',

        ]);

        try {
            $newTicket = Ticket::create($data);
        } catch (\Exception $e) {
            // Si hay un error al intentar crear el balance, maneja el error aquí
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect(route('balance.index'))->with('success', $successMessage);

    }

    public function store(Request $request)
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Balance creado con éxito' : 'Balance created succesffully';

        $data = $request->validate([
            'ingreso_c_b' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_aso' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_chapas' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_guinote' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_patrocinio' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_premios' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_tickets' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_c_b' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_disco' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_juegos' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'notas' => 'nullable|string',
            'year' => 'required|integer|digits:4',
            'fechas' => 'required|integer|digits:4',
            'incremento' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',

        ]);
        $data['gasto_premios'] = -abs($data['gasto_premios']);
        $data['gasto_tickets'] = -abs($data['gasto_tickets']);
        $data['gasto_c_b'] = -abs($data['gasto_c_b']);
        $data['gasto_disco'] = -abs($data['gasto_disco']);

        // Realiza el cálculo del incremento para el nuevo balance
        $currentYear = $data['year'];
        $previousYear = $currentYear - 1;

        $previousBalance = Balance::where('year', $previousYear)->first();

        $incremento = 0; // Valor predeterminado si no hay balance del año anterior

        if ($previousBalance) {
            $total = $data['ingreso_c_b'] + $data['ingreso_aso'] + $data['ingreso_chapas'] + $data['ingreso_guinote'] + $data['ingreso_patrocinio']
                - abs($data['gasto_premios']) - abs($data['gasto_tickets']) - abs($data['gasto_c_b']) - abs($data['gasto_disco']) - abs($data['gasto_juegos']);

            $totalAnterior = intval($previousBalance->total);

            $incremento = ($totalAnterior != 0) ? round(($total - $totalAnterior) * 100 / abs($totalAnterior), 2) : 0;
        }

        // Agrega el valor de incremento a los datos antes de crear el nuevo balance
        $data['incremento'] = $incremento;

        try {
            $newBalance = Balance::create($data);
        } catch (\Exception $e) {
            // Si hay un error al intentar crear el balance, maneja el error aquí
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect(route('balance.index'))->with('success', $successMessage);

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
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Balance actualizado con éxito' : 'Balance updated succesffully';
        $data = $request->validate([
            'ingreso_c_b' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_aso' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_chapas' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_guinote' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'ingreso_patrocinio' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_premios' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_tickets' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_c_b' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_disco' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'gasto_juegos' => 'required|numeric|regex:/^-?\d+(\.\d{1,2})?/',
            'notas' => 'nullable|string',
            'year' => 'required|integer|digits:4',
            'fechas' => 'required|integer|digits:4',
        ]);

        // Aplicar el valor absoluto y el signo negativo a los campos de gasto
        $data['gasto_premios'] = -abs($data['gasto_premios']);
        $data['gasto_tickets'] = -abs($data['gasto_tickets']);
        $data['gasto_c_b'] = -abs($data['gasto_c_b']);
        $data['gasto_disco'] = -abs($data['gasto_disco']);
        $data['gasto_juegos'] = -abs($data['gasto_juegos']);
        $balance->update($data);

        try {
            $balance->update($data);
        } catch (\Exception $e) {
            // Si hay un error al intentar crear el balance, maneja el error aquí
            //return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'No se pudo completar la edicion');

        }

        return redirect(route('balance.index'))->with('success', $successMessage);

    }
    public function chart(Request $request, BalanceTotalChart $chart)
    {
        $locale = $request->session()->get('locale');
        $balanceData = DB::table('balances') /*->select('total', 'year')*/->orderBy('year', 'asc')->get();
        $total = $balanceData->pluck('total');
        $years = $balanceData->pluck('year')->unique();
        $ingreso_c_b = $balanceData->pluck('ingreso_c_b');
        $ingreso_aso = $balanceData->pluck('ingreso_aso');
        $ingreso_chapas = $balanceData->pluck('ingreso_chapas');
        $ingreso_guinote = $balanceData->pluck('ingreso_guinote');
        $ingreso_patrocinio = $balanceData->pluck('ingreso_patrocinio');
        $gasto_premios = $balanceData->pluck('gasto_premios');
        $gasto_tickets = $balanceData->pluck('gasto_tickets');
        $gasto_c_b = $balanceData->pluck('gasto_c_b');
        $gasto_disco = $balanceData->pluck('gasto_disco');
        $gasto_juegos = $balanceData->pluck('gasto_juegos');

        $labels = ($locale === 'es') ? [
            'Evolución del valor total',
            'Valores totales de balances en el tiempo',
            'Bebida y comida',
            'Asociacion',
            'Chapas',
            'Guinote',
            'Patrocinio',
            'Premios',
            'Tickets',
            'Discomovil',
            'Juegos para niños',
        ] :
            [
                'Total value evolution',
                'Balances total values through time',
                'Drinks & Food',
                'Association',
                'Chapas',
                'Guinote',
                'Sponsors',
                'Awards',
                'Tickets',
                'Mobile DJ',
                'Games for kids',
            ];

        return view('balances.chart', ['chart' => $chart->build($total, $years, $ingreso_c_b, $ingreso_aso, $ingreso_chapas, $ingreso_guinote, $ingreso_patrocinio, $gasto_premios, $gasto_tickets, $gasto_c_b, $gasto_disco, $gasto_juegos, $labels)]);
    }

    /*public function chartDisco(BalanceTotalChart $chart)
    {
    $balanceData = DB::table('balances')->select('gasto_disco', 'year')->orderBy('year', 'asc')->get();
    $disco = $balanceData->pluck('gasto_disco');
    $years = $balanceData->pluck('year')->unique();

    return view('balances.chart', ['chart' => $chart->build($disco, $years)]);
    }*/
    public function infoChart(Request $request, Balance $balance, PieChartIngresos $chart1, PieChartGastos $chart2, TicketsBarChart $chart3)
    {
        /*$ticket = Ticket::where('year', $balance->year)->get();
        $ticket = DB::table('tickets')->where('year', $balance->year)->get();*/
        $locale = $request->session()->get('locale');

        $ticket = Ticket::where('year', $balance->year)->first();

        $hasTicketsData = !is_null($ticket);
        $gastos = [
            abs($balance->gasto_premios),
            abs($balance->gasto_tickets),
            abs($balance->gasto_c_b),
            abs($balance->gasto_disco),
            abs($balance->gasto_juegos),
        ];

        $ingresos = [
            abs($balance->ingreso_c_b),
            abs($balance->ingreso_aso),
            abs($balance->ingreso_chapas),
            abs($balance->ingreso_guinote),
            abs($balance->ingreso_patrocinio),
        ];
        $labelsGastos = ($locale === 'es') ? ['Premios', 'Tickets', 'Bebida', 'Discomovil', 'Juegos infantiles']
            : ['Awards', 'Tickets', 'Drinks', 'Mobile DJ', 'Games for kids'];
        $labelsIngresos = ($locale === 'es') ? ['Bebida', 'Asociacion', 'Chapas', 'Guiñote', 'Patrocinadores']
            : ['Drinks', 'Association', 'Chapas', 'Guiñote', 'Sponsors']; //Añadir beneficio bingo

        $titleGastos = ($locale === 'es') ? 'GASTOS' : 'EXPENSES';
        $titleIngresos = ($locale === 'es') ? 'INGRESOS' : 'PROFITS';
        //$labelsGastos = ['Premios', 'Tickets', 'Bebida', 'Discomovil'];

        return view('balances.info', [
            'balance' => $balance,
            'ticket' => $ticket,
            'hasTicketsData' => $hasTicketsData,
            'chart1' => $chart1->build($ingresos, $labelsIngresos, $titleIngresos),
            'chart2' => $chart2->build($gastos, $labelsGastos, $titleGastos),
        ]);
    }

    /*public function info(Balance $balance)
    {
    return view('balances.info', ['balance' => $balance]);
    }*/
    public function ticket(Request $request, Balance $balance, TicketsBarChart $chart)
    {

        $locale = $request->session()->get('locale');

        $ticket = Ticket::where('year', $balance->year)->first();
        $labelsBebidas = ($locale === 'es') ? ['Cubata', 'Cerveza', 'Agua/Refresco', 'Bocadillo', 'Copa', 'Litro cerveza'] : ['Cocktail', 'Beer', 'Water/Soda', 'Sandwich', 'Neat Drink', 'Beer 1L'];
        $text = ($locale === 'es') ? ['Tickets: totales vs. vendidos', 'Totales', 'Vendidos'] : ['Tickets: total vs. sold', 'Total', 'Sold'];

        return view('balances.ticket', [
            'ticket' => $ticket,
            'chart3' => $chart->build($ticket, $labelsBebidas, $text),
        ]);
    }
}
