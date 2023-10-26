<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Balance') }}
        </h2>
    </x-slot>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="p-6 text-gray-900">
                            <form method="post" action="{{route('balance.update', ['balance' => $balance])}}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mb-3">GASTOS</h1>
                                        
                                        <x-input-label>Premios</x-input-label>
                                        <input type="text" name="gasto_premios" placeholder="Premios" value="{{$balance->gasto_premios}}"/>

                                        <x-input-label>Tickets</x-input-label>
                                        <input type="text" name="gasto_tickets" placeholder="Tickets" value="{{$balance->gasto_tickets}}"/>

                                        <x-input-label>Bebida y comida</x-input-label>
                                        <input type="text" name="gasto_c_b" placeholder="Bebida y comida" value="{{$balance->gasto_c_b}}"/>

                                        <x-input-label>Discomovil</x-input-label>
                                        <input type="text" name="gasto_disco" placeholder="Discomovil" value="{{$balance->gasto_disco}}"/>
                                    </div>
                                    <div class="col">
                                        <h1 class="mb-3">INGRESOS</h1>
                                        <x-input-label>Año</x-input-label>
                                        <input type="text" name="year" placeholder="Año" value="{{$balance->year}}"/>

                                        <x-input-label>Comida y bebida</x-input-label>
                                        <input type="text" name="ingreso_c_b" placeholder="Comida y bebida" value="{{$balance->ingreso_c_b}}"/>

                                        <x-input-label>Aporte asociacion</x-input-label>
                                        <input type="text" name="ingreso_aso" placeholder="Aporte Asociación" value="{{$balance->ingreso_aso}}"/>

                                        <x-input-label> </x-input-label>
                                        <input type="submit" value="Actualizar">
                                            
                                        </input>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>