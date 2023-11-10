<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ideas') }}
        </h2>
        <div>
            @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="p-6 text-gray-900 w-100">
                        
                        <div class="row ">
                            @foreach($ideas as $idea)
                            
                            <div class="col-4">
                                <x-card-idea :id="$idea->id" :creador="$idea->creador" :titulo="$idea->titulo" :tematica="$idea->tematica"
                                    :descripcion="$idea->descripcion" :vista="$idea->vista"/>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>