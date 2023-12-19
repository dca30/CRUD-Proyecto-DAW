<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets')  }}  {{$ticket->year}}
        </h2>
        
    </x-slot>
    <div class="py-4">
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
                                <h3 class="text-lg font-semibold">Tickets</h3>
                                <div class="flex justify-between mt-2">
                                    <p>Cubata:</p>
                                    <p>{{$ticket->tickets_comprados_cubata}}/{{$ticket->tickets_totales_cubata}}</p>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <p>Cerveza:</p>
                                    <p>{{$ticket->tickets_comprados_cerveza}}/{{$ticket->tickets_totales_cerveza}}</p>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <p>Agua/Refresco:</p>
                                    <p>{{$ticket->tickets_comprados_agua_refresco}}/{{$ticket->tickets_totales_agua_refresco}}</p>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <p>Bocadillo:</p>
                                    <p>{{$ticket->tickets_comprados_bocadillo}}/{{$ticket->tickets_totales_bocadillo}}</p>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <p>Copa:</p>
                                    <p>{{$ticket->tickets_comprados_copa}}/{{$ticket->tickets_totales_copa}}</p>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <p>Litro Cerveza:</p>
                                    <p>{{$ticket->tickets_comprados_litro_cerveza}}/{{$ticket->tickets_totales_litro_cerveza}}</p>
                                </div>
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
                    <div class="col py-6 bg-white rounded shadow">
                        {!! $chart3->container() !!}
                    </div>
                </div>
            </div>
            <script src="{{ $chart3->cdn() }}"></script>
            {{ $chart3->script() }}
        </div>
    </div>
    
</x-app-layout>
