<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="p-6 text-gray-900 w-100">
                        @php
                        $balancesCount = count($balances);
                        @endphp

                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach($balances as $key => $balance)
                            @php
                            $nextBalance = ($key < $balancesCount - 1) ? $balances[$key + 1] : null;
                                $highestYearBalance=max($balances->pluck('year')->all());
                                @endphp
                                <div class="col">
                                    <x-card-balance :title="$balance->year" :beneficio="$balance->ingreso_c_b"
                                        :total="$balance->total" :balance="$balance" :nextBalance="$nextBalance"
                                        :maxYear="$highestYearBalance" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-floating-card :chartData="$chart"></x-floating-card>
</x-app-layout>