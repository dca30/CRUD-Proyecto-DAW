<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Balance') }} > {{ __('Create') }}
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
                    <form method="post" action="{{route('balance.store')}}">
                            @csrf
                            @method('post')
                            <div class="grid grid-cols-9 gap-4">
                                <div class="col-span-4 sm:col-span-3 col-start-6 text-center">
                                    <div class="bg-white sm:rounded-lg p-4 sombra-negra">
                                        <h3 class="text-lg font-semibold">INFO</h3>

                                        <x-input-label>{{ __('Year') }}</x-input-label>
                                        <x-text-input class="mb-3" name="year" placeholder="Año" />

                                        <x-input-label>{{ __('Date') }}</x-input-label>
                                        <x-text-input class="mb-3" name="fechas" placeholder="Fechas" />
                                    </div>
                                    <div class="bg-white sm:rounded-lg p-4 mt-3 sombra-negra">
                                        <h3 class="text-lg font-semibold">{{ __('NOTES') }}</h3>

                                        <textarea name="notas" rows="4" cols="15"
                                            class="my-3 form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                                    </div>
                                </div>
                                <div class="col-span-4 sm:col-span-3 text-center">
                                    <div class="bg-white sm:rounded-lg col-start-2 p-4 sombra-verde">
                                        <h3 class="text-lg font-semibold">{{ __('PROFITS') }}</h3>
                                        <x-input-label>{{ __('Drinks & food') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_c_b" placeholder="Comida y bebida" />

                                        <x-input-label>{{ __('Association contribution') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_aso" placeholder="Aporte Asociación" />

                                        <x-input-label>{{ __('Torneo chapas') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_chapas" placeholder="Chapas" />

                                        <x-input-label>{{ __('Torneo guiñote') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_guinote" placeholder="Guiñote" />

                                        <x-input-label>{{ __('Patrocinadores') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_patrocinio" placeholder="Patrocinadores" />

                                    </div>
                                </div>

                                <div class="col-span-4 sm:col-span-3 col-start-6 text-center">
                                    <div class="bg-white sombra-roja sm:rounded-lg p-4 bg-success">
                                        <h3 class="text-lg font-semibold">{{ __('EXPENSES') }}</h3>
                                        <x-input-label>{{ __('Awards') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_premios"
                                            placeholder="Premios" />

                                        <x-input-label>{{ __('Tickets') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_tickets" 
                                            placeholder="Tickets" />

                                        <x-input-label>{{ __('Drinks & food') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_c_b" 
                                            placeholder="Bebida y comida" />

                                        <x-input-label>{{ __('Mobile DJ') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_disco" 
                                            placeholder="Discomovil" />
                                        <x-input-label>{{ __('Games for kids') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_juegos" 
                                            placeholder="Juegos" />
                                    </div>
                                </div>
                            </div>
                            <div class="text-center pt-4">
                                <input type="submit" value="">
                                <x-success-button>
                                    {{ __('Submit') }}
                                </x-success-button></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>