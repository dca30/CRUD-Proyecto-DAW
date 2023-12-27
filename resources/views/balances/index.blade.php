<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Balances') }}
            </h2>
            
            <a href="{{ route('balance.chart') }}">
                <x-primary-button class="ml-3">
                    {{ __('Summary chart') }}
                </x-primary-button>
            </a>
        </div>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div>
                        @if(session()->has('success'))
                        <div>
                            {{session('success')}}
                        </div>
                        @endif
                    </div>
                    <div class="text-end">
                    @if (auth()->id() === 1)
                        <a href="{{ route('balance.create') }}">
                            <x-success-button>
                                {{ __('Add new') }}
                            </x-success-button>
                        </a>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Drinks profit') }}</th>
                                    <th scope="col">{{ __('Association contribution') }}</th>
                                    <th scope="col">{{ __('Awards expense') }}</th>
                                    <th scope="col">{{ __('Tickets expense') }}</th>
                                    <th scope="col">{{ __('Drinks espense') }}</th>
                                    <th scope="col">{{ __('Mobile DJ') }}</th>
                                    <th scope="col">{{ __('TOTAL') }}</th>
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
                                    <td class="fw-bold">{{$balance->total}} €</td>
                                    <td>
                                        @if (auth()->id() === 1)
                                        <a href="{{ route('balance.edit', ['balance' => $balance]) }}">
                                            <x-secondary-button class="ml-3">
                                                <i class="fa fa-pencil"></i>

                                            </x-secondary-button>
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('balance.info', ['balance' => $balance]) }}">
                                            <x-secondary-button class="ml-3">
                                                <i class="fa fa-eye"></i>
                                                <!--<i class="fa fa-search-plus"></i>-->
                                            </x-secondary-button>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>