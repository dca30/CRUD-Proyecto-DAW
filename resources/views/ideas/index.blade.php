<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ideas') }}
            </h2>
            <div class="fw-bold text-sm text-blue-600 space-y-1">
                @if(session()->has('success'))
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)">
                    {{session('success')}}</p>
                @endif
            </div>
            <a></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 w-100 justify-between">
                    <div class="row row-cols-auto pb-4 justify-between">
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <p><i class="fa fa-sort" style="transform:scale(1.3)"></i></p>
                            </div>
                            <div class="col d-flex align-items-center px-1">
                                <a href="{{ route('idea.index', ['criteria' => 'creador']) }}">
                                    {{__('User') }}
                                </a>
                            </div>
                            <div class="col d-flex align-items-center px-1">
                                <a href="{{ route('idea.index', ['criteria' => 'tematica']) }}">{{__('Type') }}</a>
                            </div>
                            <div class="col d-flex align-items-center px-1">
                                <a href="{{ route('idea.index', ['criteria' => 'created_at']) }}">{{ __('Date') }}</a>
                            </div>
                            @if (auth()->id() == 1)
                            <div class="col d-flex align-items-center px-1">
                                <a href="{{ route('idea.index', ['criteria' => 'vista']) }}">{{ __('Pending') }}</a>
                            </div>
                            @endif
                        </div>


                        <div class="">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewModal">
                                <x-button-add>
                                    {{ __('Add new') }}
                                </x-button-add>
                            </a>
                        </div>
                    </div>

                    <div class="row ">
                        @foreach($ideas as $idea)
                        <div class="col-4">
                            <x-card-idea :id="$idea->id" :creador="$idea->creador" :titulo="$idea->titulo"
                                :tematica="$idea->tematica" :descripcion="$idea->descripcion" :vista="$idea->vista"
                                :fecha="$idea->created_at" :anonimo="$idea->anonimo" />
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
                                            <x-input-label class="mb-2" for="titulo" :value="__('Title')" />
                                            <x-text-input id="titulo" class="block mt-1 w-full" type="text"
                                                name="titulo" :value="old('titulo')" required autofocus />
                                        </div>
                                        <div class="form-group mb-4">
                                            <x-input-label class="mb-2" for="descripcion" :value="__('Description')" />
                                            <textarea id="descripcion" name="descripcion" :value="old('descripcion')"
                                                required autofocus rows="4" cols="15"
                                                class="my-3 form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                                        </div>
                                        <div class="form-group mb-4">
                                            <x-input-label class="mb-2" for="tematica" :value="__('Type')" />
                                            <div>
                                                <x-input-label for="bajo" class="inline-flex items-center">
                                                    <x-text-input type="radio" name="tematica" value="Comida y bebida"
                                                        id="cyb" />
                                                    <span class="ml-2">{{ __('Drink/Food') }}</span>
                                                </x-input-label>
                                                <x-input-label for="medio" class="inline-flex items-center ml-4">
                                                    <x-text-input type="radio" name="tematica" value="Prefiestas"
                                                        id="prefes" />
                                                    <span class="ml-2">{{ __('Prefestivities') }}</span>
                                                </x-input-label>
                                                <x-input-label for="alto" class="inline-flex items-center ml-4">
                                                    <x-text-input type="radio" name="tematica" value="Fiestas"
                                                        id="fes" />
                                                    <span class="ml-2">{{ __('Festivities') }}</span>
                                                </x-input-label>
                                                <x-input-label for="alto" class="inline-flex items-center ml-4">
                                                    <x-text-input type="radio" name="tematica" value="Actividades"
                                                        id="act" />
                                                    <span class="ml-2">{{ __('Activities') }}</span>
                                                </x-input-label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="anonimo"
                                                    id="anonimo">
                                                <label class="form-check-label" for="anonimo">{{ __('Anonymous')
                                                        }}</label>
                                            </div>
                                        </div>


                                        <div class="flex items-center justify-end mt-4">
                                            <x-button-accept class="ml-3">
                                                {{ __('Submit') }}
                                            </x-button-accept>
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
</x-app-layout>