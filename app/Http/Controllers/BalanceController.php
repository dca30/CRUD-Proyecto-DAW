<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;


class BalanceController extends Controller
{
    public function index()
    {
        $balances = Balance::orderBy('year','desc')->get();
        return view('balances.index', ['balances' => $balances]);

    }
    public function info(Balance $balance)
    {
        return view('balances.info', ['balance' => $balance]);
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
}