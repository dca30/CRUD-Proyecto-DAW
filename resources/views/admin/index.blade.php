<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Panel') }}
            </h2>
            <div class="fw-bold text-sm text-blue-600 space-y-1">
                @if(session()->has('success'))
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)">
                    {{session('success')}}</p>
                @endif
            </div>
            <div></div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{--Crear nuevo usuario--}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.partials.create-user-form')
                </div>
            </div>
            {{--Editar/Eliminar usuario(s)--}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.partials.edit-user')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>