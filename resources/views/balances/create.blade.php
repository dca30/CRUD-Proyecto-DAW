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
                        <form method="post" action="{{route('balance.store')}}">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col">
                                    <h1 class="mb-3">GASTOS</h1>
                                    
                                    <x-input-label>Premios</x-input-label>
                                    <input type="text" name="gasto_premios" placeholder="Premios" />

                                    <x-input-label>Tickets</x-input-label>
                                    <input type="text" name="gasto_tickets" placeholder="Tickets" />

                                    <x-input-label>Bebida y comida</x-input-label>
                                    <input type="text" name="gasto_c_b" placeholder="Bebida y comida" />

                                    <x-input-label>Discomovil</x-input-label>
                                    <input type="text" name="gasto_disco" placeholder="Discomovil" />
                                </div>
                                <div class="col">
                                    <h1 class="mb-3">INGRESOS</h1>
                                    <x-input-label>Año</x-input-label>
                                    <input type="text" name="year" placeholder="Año" />

                                    <x-input-label>Comida y bebida</x-input-label>
                                    <input type="text" name="ingreso_c_b" placeholder="Comida y bebida" />

                                    <x-input-label>Aporte asociacion</x-input-label>
                                    <input type="text" name="ingreso_aso" placeholder="Aporte Asociación" />

                                    <x-input-label> </x-input-label>
                                    <input type="submit" value="Enviar">
                                        
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