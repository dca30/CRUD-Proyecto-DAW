<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Balance') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="p-6 text-gray-900">
                        <div class="d-flex justify-content-between align-items-center">
                            <!--<h1 class="text-primary mb-3">Balance</h1>-->

                        </div>

                        <div>
                            @if(session()->has('success'))
                            <div>
                                {{session('success')}}
                            </div>
                            @endif
                        </div>
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Dificultad</th>
                                        <th scope="col">Responsable(s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter=1;
                                    @endphp
                                    @foreach($tasks as $task)
                                    <tr>
                                        <th scope="row">{{ $counter }}</th>
                                        <td>{{ $task->descripcion }}</td>
                                        <td>
                                            @if ($task->dificultad === 'B')
                                            <i class="fa fa-regular fa-circle text-success"></i> <!-- Verde -->
                                            @elseif ($task->dificultad === 'M')
                                            <i class="fa fa-regular fa-circle text-warning"></i> <!-- Amarillo -->
                                            @elseif ($task->dificultad === 'A')
                                            <i class="fa fa-regular fa-circle text-danger"></i> <!-- Rojo -->
                                            @endif
                                        </td>
                                        <td>{{ $task->responsables }}</td>
                                        <td>
                                            <form action="{{ route('task.joinGroup', ['task' => $task]) }}"
                                                method="POST">
                                                @csrf
                                                <x-secondary-button type="submit" class="ml-3">
                                                    {{ __('Join Group') }}
                                                </x-secondary-button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('task.leaveGroup', ['task' => $task]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit" class="ml-3">
                                                    {{ __('Leave Group') }}
                                                </x-danger-button>
                                            </form>
                                        </td>
                                        @if (auth()->id() === 1)
                                        <td>
                                            <form action="{{ route('task.destroy', ['task' => $task]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <x-danger-button type="submit" class="ml-3">
                                                    {{ __('X') }}
                                                </x-danger-button>
                                            </form>                                            
                                        </td>
                                        @endif
                                    </tr>
                                    @php
                                    $counter++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addNewModal">
                                @if (auth()->id() === 1)
                                <x-success-button>
                                    {{ __('Add new') }}
                                </x-success-button>
                                @endif
                            </a>
                            <div class="modal fade" id="addNewModal" tabindex="-1" aria-labelledby="addNewModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewModalLabel">{{ __('Add new task') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulario para agregar nueva entrada -->
                                            <form action="{{ route('task.store') }}" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <x-input-label for="descripcion" :value="__('Descripción')" />
                                                    <x-text-input id="descripcion" class="block mt-1 w-full" type="text"
                                                        name="descripcion" :value="old('descripcion')" required
                                                        autofocus />
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label for="dificultad" :value="__('Dificultad')" />
                                                    <div class="mt-1">
                                                        <x-input-label for="bajo" class="inline-flex items-center">
                                                            <x-text-input type="radio" name="dificultad" value="B"
                                                                id="bajo" />
                                                            <span class="ml-2">Bajo</span>
                                                        </x-input-label>
                                                        <x-input-label for="medio" class="inline-flex items-center ml-4">
                                                            <x-text-input type="radio" name="dificultad" value="M"
                                                                id="medio" />
                                                            <span class="ml-2">Medio</span>
                                                        </x-input-label>
                                                        <x-input-label for="alto" class="inline-flex items-center ml-4">
                                                            <x-text-input type="radio" name="dificultad" value="A"
                                                                id="alto" />
                                                            <span class="ml-2">Alto</span>
                                                        </x-input-label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label for="responsables" :value="__('Responsable(s')" />
                                                    <x-text-input id="responsables" class="block mt-1 w-full"
                                                        type="text" name="responsables" :value="old('responsables')" />
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>