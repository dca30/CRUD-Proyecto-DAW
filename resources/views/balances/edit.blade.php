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
                <x-input-error :messages="$errors->get('ingreso_c_')" class="mt-2" />
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
                            <div class="grid grid-cols-9 gap-4">
                                <div class="col-span-4 sm:col-span-3 col-start-6 text-center">
                                    <div class="bg-white sm:rounded-lg p-4 sombra-negra">
                                        <h3 class="text-lg font-semibold">INFO</h3>

                                        <x-input-label>{{ __('Year') }}</x-input-label>
                                        <x-text-input class="mb-3" name="year" :value="$balance->year"
                                            placeholder="Año" />

                                        <x-input-label>{{ __('Date') }}</x-input-label>
                                        <x-text-input class="mb-3" name="fechas" :value="$balance->fechas"
                                            placeholder="Fechas" />
                                    </div>
                                    <div class="bg-white sm:rounded-lg p-4 mt-3 sombra-negra">
                                        <h3 class="text-lg font-semibold">{{ __('NOTES') }}</h3>
                                        <textarea name="notas" rows="4" cols="15"
                                            class="my-3 form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{$balance->notas}}</textarea>
                                    </div>
                                </div>
                                <div class="col-span-4 sm:col-span-3 text-center">
                                    <div class="bg-white sm:rounded-lg col-start-2 p-4 sombra-verde">
                                        <h3 class="text-lg font-semibold">{{ __('PROFITS') }}</h3>
                                        <x-input-label>{{ __('Drinks & food') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_c_b" :value="$balance->ingreso_c_b" />

                                        <x-input-label>{{ __('Association contribution') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_aso" :value="$balance->ingreso_aso" />

                                        <x-input-label>{{ __('Chapas tournament') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_chapas"
                                            :value="$balance->ingreso_chapas" />

                                        <x-input-label>{{ __('Guiñote tournament') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_guinote"
                                            :value="$balance->ingreso_guinote" />

                                        <x-input-label>{{ __('Sponsors') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_patrocinio"
                                            :value="$balance->ingreso_patrocinio" />
                                    </div>
                                </div>

                                <div class="col-span-4 sm:col-span-3 col-start-6 text-center">
                                    <div class="bg-white sombra-roja sm:rounded-lg p-4 bg-success">
                                        <h3 class="text-lg font-semibold">{{ __('EXPENSES') }}</h3>
                                        <x-input-label>{{ __('Drinks & food') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_c_b" :value="$balance->gasto_c_b" />

                                        <x-input-label>{{ __('Awards') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_premios"
                                            :value="$balance->gasto_premios" />

                                        <x-input-label>{{ __('Tickets') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_tickets"
                                            :value="$balance->gasto_tickets" />

                                        <x-input-label>{{ __('Mobile DJ') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_disco" :value="$balance->gasto_disco"
                                            placeholder="Discomovil" />
                                        <x-input-label>{{ __('Games for kids') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_juegos"
                                            :value="$balance->gasto_juegos" />
                                    </div>
                                </div>
                            </div>
                            <div class="text-center pt-4">
                                <input type="submit" value="">
                                <x-button-accept>
                                    {{ __('Submit') }}
                                </x-button-accept></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>