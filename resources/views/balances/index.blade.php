<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Balance') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="p-6 text-gray-900">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="text-primary mb-3">Balance</h1>
                            
                        </div>

                        <div>
                            @if(session()->has('success'))
                            <div>
                                {{session('success')}}
                            </div>
                            @endif
                        </div>
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Bebida Beneficio</th>
                                        <th scope="col">Aporte Asociacion</th>
                                        <th scope="col">Premios gasto</th>
                                        <th scope="col">Tickets gasto</th>
                                        <th scope="col">Bebida gasto</th>
                                        <th scope="col">Discomovil</th>
                                        <th scope="col">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($balances as $balance )
                                    <tr>
                                        <th scope="row">{{$balance->year}}</th>
                                        <td>{{$balance->ingreso_c_b}}</td>
                                        <td>{{$balance->ingreso_aso}}</td>
                                        <td>{{$balance->gasto_premios}}</td>
                                        <td>{{$balance->gasto_tickets}}</td>
                                        <td>{{$balance->gasto_c_b}}</td>
                                        <td>{{$balance->gasto_disco}}</td>
                                        <td class="fw-bold">
                                            {{ $balance->ingreso_c_b +
                                                $balance->ingreso_aso +
                                                $balance->gasto_premios +
                                                $balance->gasto_tickets +
                                                $balance->gasto_c_b +
                                                $balance->gasto_disco }} €
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('balance.create') }}">
                                <x-success-button>
                                    {{ __('Add new') }}
                                </x-success-button>
                            </a>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>