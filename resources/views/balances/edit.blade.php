<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Balance') }} > {{ __('Edit') }}
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
                <div class="">
                    <div class="p-6 text-gray-900">
                        <form method="post" action="{{ route('balance.update', ['balance' => $balance]) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col">
                                    <h1 class="mb-3">{{ __('Expenses') }}</h1>

                                    <x-input-label>{{ __('Awards') }}</x-input-label>
                                    <x-text-input class="mb-3" name="gasto_premios" :value="$balance->gasto_premios"
                                        placeholder="Premios" />

                                    <x-input-label>{{ __('Tickets') }}</x-input-label>
                                    <x-text-input class="mb-3" name="gasto_tickets" :value="$balance->gasto_tickets"
                                        placeholder="Tickets" />

                                    <x-input-label>{{ __('Drinks & Food') }}</x-input-label>
                                    <x-text-input class="mb-3" name="gasto_c_b" :value="$balance->gasto_c_b"
                                        placeholder="Bebida y comida" />

                                    <x-input-label>{{ __('Mobile DJ') }}</x-input-label>
                                    <x-text-input class="mb-3" name="gasto_disco" :value="$balance->gasto_disco"
                                        placeholder="Discomovil" />
                                </div>
                                <div class="col">
                                    <h1 class="mb-3">{{ __('Profit') }}</h1>

                                    <x-input-label>{{ __('Year') }}</x-input-label>
                                    <x-text-input class="mb-3" name="year" :value="$balance->year" placeholder="Año" />

                                    <x-input-label>{{ __('Drinks & Food') }}</x-input-label>
                                    <x-text-input class="mb-3" name="ingreso_c_b" :value="$balance->ingreso_c_b"
                                        placeholder="Comida y bebida" />

                                    <x-input-label>{{ __('Association contribution') }}</x-input-label>
                                    <x-text-input class="mb-3" name="ingreso_aso" :value="$balance->ingreso_aso"
                                        placeholder="Aporte Asociación" />

                                    <x-input-label>{{ __('Date') }}</x-input-label>
                                    <x-text-input class="mb-3" name="fechas" :value="$balance->fechas"
                                        placeholder="Fechas" />

                                    <x-input-label></x-input-label>
                                    <input type="submit" value="">
                                    <x-success-button>
                                        {{ __('Submit') }}
                                    </x-success-button></input>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>