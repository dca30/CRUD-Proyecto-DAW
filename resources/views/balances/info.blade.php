<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Balance') }} {{$balance->year}}
            </h2>
            <a href="{{ route('balance.ticket', ['balance' => $balance],['ticket' => $ticket] ) }}">
                <x-primary-button class="ml-3">
                    {{ __('Info tickets') }}
                </x-primary-button>
            </a>
        </div>
    </x-slot>
    <div class="pt-10 pb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                    </div>

                    @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                    @endif

                    <div class="grid grid-cols-4 gap-4">
                        <div class="col-span-4 sm:col-span-2">
                            <div class="bg-white shadow-sm sm:rounded-lg p-4">
                                <h3 class="text-lg font-semibold">Ingresos</h3>
                                <div class="flex justify-between mt-2">
                                    <p>Bebida Beneficio:</p>
                                    <p>{{$balance->ingreso_c_b}}€</p>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <p>Aporte Asociacion:</p>
                                    <p>{{$balance->ingreso_aso}}€</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <div class="bg-white shadow-sm sm:rounded-lg p-4">
                                <h3 class="text-lg font-semibold">Gastos</h3>
                                <div class="flex justify-between mt-2">
                                    <p>Premios gasto:</p>
                                    <p>{{$balance->gasto_premios}}€</p>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <p>Tickets gasto:</p>
                                    <p>{{$balance->gasto_tickets}}€</p>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <p>Bebida gasto:</p>
                                    <p>{{$balance->gasto_c_b}}€</p>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <p>Discomovil:</p>
                                    <p>{{$balance->gasto_disco}}€</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4 sm:col-span-2">
                            <div class="bg-white shadow-sm sm:rounded-lg p-4">
                                <h3 class="text-lg font-semibold">TOTAL</h3>
                                <p class="text-2xl font-bold text-center">{{$balance->total}} €</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto">
                <div class="row">
                    <div class="col p-6 me-3 bg-white rounded shadow">
                        {!! $chart1->container() !!}
                    </div>
                    <div class="col p-6 ms-3 bg-white rounded shadow">
                        {!! $chart2->container() !!}
                    </div>
                </div>
            </div>
            <script src="{{ $chart1->cdn() }}"></script>
            {{ $chart1->script() }}
            <script src="{{ $chart2->cdn() }}"></script>
            {{ $chart2->script() }}

        </div>
    </div>
</x-app-layout>