<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Balance') }} > {{$ticket->year}} > {{ __('Tickets') }}
        </h2>

    </x-slot>
    <div class="py-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-14 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                    @endif

                    <div class="grid grid-cols-5 gap-3">
                        <div class="col-span-4 sm:col-span-1">
                            <div class="p-3 mb-3 bg-white rounded shadow">
                                <h3 class="text-lg font-semibold">Tickets</h3>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Cocktail') }}:</p>
                                    <p>{{$ticket->precio_ticket_cubata}}/{{$ticket->tickets_totales_cubata}}</p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Beer') }}:</p>
                                    <p>{{$ticket->tickets_vendidos_cerveza}}/{{$ticket->tickets_totales_cerveza}}</p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Water/Soda') }}:</p>
                                    <p>{{$ticket->tickets_vendidos_agua_refresco}}/{{$ticket->tickets_totales_agua_refresco}}
                                    </p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Sandwich') }}:</p>
                                    <p>{{$ticket->tickets_vendidos_bocadillo}}/{{$ticket->tickets_totales_bocadillo}}
                                    </p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Neat drink') }}:</p>
                                    <p>{{$ticket->tickets_vendidos_copa}}/{{$ticket->tickets_totales_copa}}</p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Beer 1L') }}:</p>
                                    <p>{{$ticket->tickets_vendidos_litro_cerveza}}/{{$ticket->tickets_totales_litro_cerveza}}
                                    </p>
                                </div>
                            </div>
                            <div class="p-6 bg-white rounded shadow">
                                <h3 class="text-lg font-semibold">{{ __('Prices (€)') }}</h3>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Cocktail') }}:</p>
                                    <p>{{$ticket->precio_ticket_cubata}}</p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Beer') }}:</p>
                                    <p>{{$ticket->precio_ticket_cubata}}</p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Water/Soda') }}:</p>
                                    <p>{{$ticket->precio_ticket_agua_refresco}}</p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Sandwich') }}:</p>
                                    <p>{{$ticket->precio_ticket_bocadillo}}</p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Neat drink') }}:</p>
                                    <p>{{$ticket->precio_ticket_copa}}</p>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <p>{{ __('Beer 1L') }}:</p>
                                    <p>{{$ticket->precio_ticket_litro_cerveza}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4 sm:col-span-4">
                            <div class="container mx-auto">
                                <div class="row">
                                    <div class="col py-6 bg-white rounded shadow">
                                        {!! $chart3->container() !!}
                                    </div>
                                </div>
                            </div>
                            <script src="{{ $chart3->cdn() }}"></script>
                            {{ $chart3->script() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>