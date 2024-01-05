<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Balance') }} > {{ __('Create') }}
            </h2>
            <div class="fw-bold text-sm mi-color-rojo space-y-1">
                @if($errors->any())
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)">
                    {{ __('There is an error in the form. Check the fields.') }}</p>
                @endif
            </div>
            <div></div>
        </div>
    </x-slot>

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
                                        <x-text-input class="mb-3" name="year" placeholder="" />
                                        <x-input-error :messages="$errors->get('year')" class="mt-2" />

                                        <x-input-label>{{ __('Date') }}</x-input-label>
                                        <x-text-input class="mb-3" name="fechas" placeholder="" />
                                        <x-input-error :messages="$errors->get('fechas')" class="mt-2" />
                                    </div>
                                    <div class="bg-white sm:rounded-lg p-4 mt-3 sombra-negra">
                                        <h3 class="text-lg font-semibold">{{ __('NOTES') }}</h3>

                                        <textarea name="notas" rows="4" cols="15"
                                            class="my-3 form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                                        <x-input-error :messages="$errors->get('notas')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-span-4 sm:col-span-3 text-center">
                                    <div class="bg-white sm:rounded-lg col-start-2 p-4 sombra-verde">
                                        <h3 class="text-lg font-semibold">{{ __('PROFITS') }}</h3>
                                        <x-input-label>{{ __('Drinks & food') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_c_b" placeholder="" />
                                        <x-input-error :messages="$errors->get('ingreso_c_b')" class="mt-2" />

                                        <x-input-label>{{ __('Association contribution') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_aso" placeholder="" />
                                        <x-input-error :messages="$errors->get('ingreso_aso')" class="mt-2" />

                                        <x-input-label>{{ __('Chapas tournament') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_chapas" placeholder="" />
                                        <x-input-error :messages="$errors->get('ingreso_chapas')" class="mt-2" />

                                        <x-input-label>{{ __('Guiñote tournament') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_guinote" placeholder="" />
                                        <x-input-error :messages="$errors->get('ingreso_guinote')" class="mt-2" />

                                        <x-input-label>{{ __('Sponsors') }}</x-input-label>
                                        <x-text-input class="mb-3" name="ingreso_patrocinio" placeholder="" />
                                        <x-input-error :messages="$errors->get('ingreso_patrocinio')" class="mt-2" />

                                    </div>
                                </div>

                                <div class="col-span-4 sm:col-span-3 col-start-6 text-center">
                                    <div class="bg-white sombra-roja sm:rounded-lg p-4 bg-success">
                                        <h3 class="text-lg font-semibold">{{ __('EXPENSES') }}</h3>
                                        <x-input-label>{{ __('Drinks & food') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_c_b" placeholder="" />
                                        <x-input-error :messages="$errors->get('gasto_c_b')" class="mt-2" />

                                        <x-input-label>{{ __('Awards') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_premios" placeholder="" />
                                        <x-input-error :messages="$errors->get('gasto_premios')" class="mt-2" />

                                        <x-input-label>{{ __('Tickets') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_tickets" placeholder="" />
                                        <x-input-error :messages="$errors->get('gasto_tickets')" class="mt-2" />

                                        <x-input-label>{{ __('Mobile DJ') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_disco" placeholder="" />
                                        <x-input-error :messages="$errors->get('gasto_disco')" class="mt-2" />

                                        <x-input-label>{{ __('Games for kids') }}</x-input-label>
                                        <x-text-input class="mb-3" name="gasto_juegos" placeholder="" />
                                        <x-input-error :messages="$errors->get('gasto_juegos')" class="mt-2" />


                                    </div>
                                </div>
                            </div>
                            <div class="text-center pt-4">
                                <input type="submit" value="">
                                <x-button-accept>
                                    {{ __('Submit') }}
                                </x-button-accept>
                                </input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>