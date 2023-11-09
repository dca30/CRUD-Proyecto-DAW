<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ideas') }}
        </h2>
        <div>
            @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
            @endif
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="p-6 text-gray-900 w-100">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                                <x-card-idea></x-card-idea>
                                <x-card-idea></x-card-idea>
                                <x-card-idea></x-card-idea>
                                <x-card-idea></x-card-idea>
                                <x-card-idea></x-card-idea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>