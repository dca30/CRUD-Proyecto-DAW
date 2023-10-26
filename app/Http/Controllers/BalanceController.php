<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;


class BalanceController extends Controller
{
    public function index(){
        $balances = Balance::all();
        return view('balances.index', ['balances' => $balances]);
    }

    public function create(){
        return view('balances.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'ingreso_c_b' =>'required|numeric|regex:/^\d+(\.\d{1,2})?/',
            'ingreso_aso' =>'required|numeric|regex:/^\d+(\.\d{1,2})?/',
            'gasto_premios' =>'required|numeric|regex:/^\d+(\.\d{1,2})?/',
            'gasto_tickets' =>'required|numeric|regex:/^\d+(\.\d{1,2})?/',
            'gasto_c_b' =>'required|numeric|regex:/^\d+(\.\d{1,2})?/',
            'gasto_disco' =>'required|numeric|regex:/^\d+(\.\d{1,2})?/',
            'year' => 'required|integer|digits:4'
            
        ]);

        $newBalance = Balance::create($data);

        return redirect(route('balance.index'));

    }

    public function edit(Balance $balance){
        return view('balances.edit', ['balance' => $balance]);
    }

    public function update(Balance $balance, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $balance->update($data);

        return redirect(route('balance.index'))->with('success', 'Balance Updated Succesffully');

    }
}