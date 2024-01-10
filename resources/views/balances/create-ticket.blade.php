<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ticket') }} > {{$year}}> {{ __('Create') }}
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
                        <form method="post" action="{{ route('balance.storeTicket', ['balance'=>2024]) }}">
                            @csrf
                            @method('post')
                            <div class="grid grid-cols-9 gap-4">

                                <div class="col-span-4 sm:col-span-3 text-center">
                                    <div class="bg-white shadow sm:rounded-lg col-start-2 p-4">
                                        <input type="hidden" name="year" value="{{ $year }}">

                                        <h3 class="text-lg font-semibold mb-3">{{ __('Total Tickets') }}</h3>
                                        <x-input-label>{{ __('Cocktail') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_totales_cubata" placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_totales_cubata')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Beer') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_totales_cerveza" placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_totales_cerveza')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Water/Soda') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_totales_agua_refresco"
                                            placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_totales_agua_refresco')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Sandwich') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_totales_bocadillo" placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_totales_bocadillo')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Neat drink') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_totales_copa" placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_totales_copa')" class="mt-2" />

                                        <x-input-label>{{ __('Beer 1L') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_totales_litro_cerveza"
                                            placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_totales_litro_cerveza')"
                                            class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-span-4 sm:col-span-3 col-start-6 text-center">
                                    <div class="bg-white shadow sm:rounded-lg p-4 ">
                                        <h3 class="text-lg font-semibold mb-3">{{ __('Tickets Sold') }}</h3>
                                        <x-input-label>{{ __('Cocktail') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_vendidos_cubata" placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_vendidos_cubata')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Beer') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_vendidos_cerveza" placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_vendidos_cerveza')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Water/Soda') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_vendidos_agua_refresco"
                                            placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_vendidos_agua_refresco')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Sandwich') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_vendidos_bocadillo" placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_vendidos_bocadillo')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Neat drink') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_vendidos_copa" placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_vendidos_copa')" class="mt-2" />

                                        <x-input-label>{{ __('Beer 1L') }}</x-input-label>
                                        <x-text-input class="mb-3" name="tickets_vendidos_litro_cerveza"
                                            placeholder="" />
                                        <x-input-error :messages="$errors->get('tickets_vendidos_litro_cerveza')"
                                            class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-span-4 sm:col-span-3 col-start-6 text-center">
                                    <div class="bg-white shadow sm:rounded-lg p-4">
                                        <h3 class="text-lg font-semibold mb-3">{{ __('Prices') }} (€)</h3>
                                        <x-input-label>{{ __('Cocktail') }}</x-input-label>
                                        <x-text-input class="mb-3" name="precio_ticket_cubata" placeholder="" />
                                        <x-input-error :messages="$errors->get('precio_ticket_cubata')" class="mt-2" />

                                        <x-input-label>{{ __('Beer') }}</x-input-label>
                                        <x-text-input class="mb-3" name="precio_ticket_cerveza" placeholder="" />
                                        <x-input-error :messages="$errors->get('precio_ticket_cerveza')" class="mt-2" />

                                        <x-input-label>{{ __('Water/Soda') }}</x-input-label>
                                        <x-text-input class="mb-3" name="precio_ticket_agua_refresco" placeholder="" />
                                        <x-input-error :messages="$errors->get('precio_ticket_agua_refresco')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Sandwich') }}</x-input-label>
                                        <x-text-input class="mb-3" name="precio_ticket_bocadillo" placeholder="" />
                                        <x-input-error :messages="$errors->get('precio_ticket_bocadillo')"
                                            class="mt-2" />

                                        <x-input-label>{{ __('Neat drink') }}</x-input-label>
                                        <x-text-input class="mb-3" name="precio_ticket_copa" placeholder="" />
                                        <x-input-error :messages="$errors->get('precio_ticket_copa')" class="mt-2" />

                                        <x-input-label>{{ __('Beer 1L') }}</x-input-label>
                                        <x-text-input class="mb-3" name="precio_ticket_litro_cerveza" placeholder="" />
                                        <x-input-error :messages="$errors->get('precio_ticket_litro_cerveza')"
                                            class="mt-2" />






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