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
                        <div class="row row-cols-auto pb-4">
                            <p  >{{ __('ORDER BY:') }}</p>
                            <div class="col"><a
                                    href="{{ route('idea.index', ['criteria' => 'USER']) }}">{{ __('user') }}</a></div>
                            <div class="col"><a
                                    href="{{ route('idea.index', ['criteria' => 'THEME']) }}">{{ __('theme') }}</a>
                            </div>
                            <div class="col"><a
                                    href="{{ route('idea.index', ['criteria' => 'DATE']) }}">{{ __('date') }}</a></div>
                        </div>
                        <div class="row justify-content-center align-items-center g-2 pb-4">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewModal">
                                <x-success-button>
                                    {{ __('Add new') }}
                                </x-success-button>
                            </a>
                        </div>

                        <div class="row ">
                            @foreach($ideas as $idea)
                            <div class="col-4">
                                <x-card-idea :id="$idea->id" :creador="$idea->creador" :titulo="$idea->titulo"
                                    :tematica="$idea->tematica" :descripcion="$idea->descripcion"
                                    :vista="$idea->vista" />
                            </div>
                            @endforeach
                        </div>
                        <div class="modal fade" id="addNewModal" tabindex="-1" aria-labelledby="addNewModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title fw-bold" id="addNewModalLabel">{{ __('Add new idea') }}
                                        </p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario para agregar nueva tarea -->
                                        <form action="{{ route('idea.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <x-input-label class="mb-2" for="titulo" :value="__('Titulo')" />
                                                <x-text-input id="titulo" class="block mt-1 w-full" type="text"
                                                    name="titulo" :value="old('titulo')" required autofocus />
                                            </div>
                                            <div class="form-group mb-4">
                                                <x-input-label class="mb-2" for="descripcion"
                                                    :value="__('Descripción')" />
                                                <x-text-input id="descripcion" class="block mt-1 w-full" type="text"
                                                    name="descripcion" :value="old('descripcion')" required autofocus />
                                            </div>
                                            <div class="form-group mb-4">
                                                <x-input-label class="mb-2" for="tematica" :value="__('Tematica')" />
                                                <div>
                                                    <x-input-label for="bajo" class="inline-flex items-center">
                                                        <x-text-input type="radio" name="tematica" value="A" id="A" />
                                                        <span class="ml-2">{{ __('A') }}</span>
                                                    </x-input-label>
                                                    <x-input-label for="medio" class="inline-flex items-center ml-4">
                                                        <x-text-input type="radio" name="tematica" value="B" id="B" />
                                                        <span class="ml-2">{{ __('B') }}</span>
                                                    </x-input-label>
                                                    <x-input-label for="alto" class="inline-flex items-center ml-4">
                                                        <x-text-input type="radio" name="tematica" value="C" id="C" />
                                                        <span class="ml-2">{{ __('C') }}</span>
                                                    </x-input-label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="anonimo"
                                                        id="anonimo">
                                                    <label class="form-check-label"
                                                        for="anonimo">{{ __('Anonimo') }}</label>
                                                </div>
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <x-primary-button class="ml-3">
                                                    {{ __('Aceptar') }}
                                                    </x-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin modal-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>