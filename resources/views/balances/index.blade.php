<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Balances') }}
            </h2>
            <div class="fw-bold text-sm text-blue-600 space-y-1">
                @if(session()->has('success'))
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)">
                    {{session('success')}}</p> @endif
            </div>

            <a href="{{ route('balance.chart') }}">
                <x-button-info class="ml-3">
                    {{ __('Summary chart') }}
                </x-button-info>
            </a>
        </div>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-end">
                        @if (auth()->id() === 1)
                        <a href="{{ route('balance.create') }}">
                            <x-button-add>
                                {{ __('Add new') }}
                            </x-button-add>
                        </a>
                        @endif
                        <table class="text-center table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><abbr
                                            title="{{ __('Drinks & food profit') }}">{{ __('D & F') }}</abbr></th>
                                    <th scope="col"><abbr
                                            title="{{ __('Association contribution') }}">{{ __('Assoc.') }}</abbr>
                                    </th>
                                    <th scope="col">{{ __('Chapas') }}</abbr></th>
                                    <th scope="col">{{ __('Guiñote') }}</th>
                                    <th scope="col"><abbr title="{{ __('Sponsors') }}">{{ __('Spon.') }}</abbr></th>
                                    <th scope="col">{{ __('Awards') }}</th>
                                    <th scope="col">{{ __('Tickets') }}</th>
                                    <th scope="col"><abbr
                                            title="{{ __('Drinks & food espense') }}">{{ __('D & F') }}</abbr>
                                    </th>
                                    <th scope="col"><abbr title="{{ __('Mobile DJ') }}">{{ __('Disco') }}</abbr></th>
                                    <th scope="col"><abbr title="{{ __('Games for kids') }}">{{ __('Games') }}</abbr>
                                    </th>
                                    <th scope="col">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($balances as $balance )
                                <tr>
                                    <th scope="row">{{$balance->year}}</th>
                                    <td>{{$balance->ingreso_c_b}}</td>
                                    <td>{{$balance->ingreso_aso}}</td>
                                    <td>{{$balance->ingreso_chapas}}</td>
                                    <td>{{$balance->ingreso_guinote}}</td>
                                    <td>{{$balance->ingreso_patrocinio}}</td>
                                    <td>{{$balance->gasto_premios}}</td>
                                    <td>{{$balance->gasto_tickets}}</td>
                                    <td>{{$balance->gasto_c_b}}</td>
                                    <td>{{$balance->gasto_disco}}</td>
                                    <td>{{$balance->gasto_juegos}}</td>
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