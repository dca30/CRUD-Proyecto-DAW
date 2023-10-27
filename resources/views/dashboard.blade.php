<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="p-6 text-gray-900 w-100">
                        @foreach($balances as $balance )
                        <x-card :title="$balance->year" :beneficio="$balance->ingreso_c_b">
                            
                        </x-card>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>