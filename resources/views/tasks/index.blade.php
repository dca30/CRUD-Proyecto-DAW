<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
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
                <div class="">
                    <div class="p-6 text-gray-900">
                        <div class="text-end">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addNewModal">
                            @if (auth()->id() === 1)
                            <x-success-button>
                                {{ __('Add new') }}
                            </x-success-button>
                            @endif
                        </a>
                        </div>
                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Difficulty') }}</th>
                                    <th scope="col">{{ __('Responsable(s)') }}</th>
                                    
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
                                    <td class="ps-4">
                                        @if ($task->dificultad === 'B')
                                        <i class="fa fa-regular fa-circle text-success"></i>
                                        @elseif ($task->dificultad === 'M')
                                        <i class="fa fa-regular fa-circle text-warning"></i>
                                        @elseif ($task->dificultad === 'A')
                                        <i class="fa fa-regular fa-circle text-danger"></i>
                                        @endif
                                    </td>
                                    <td>{{ $task->responsables }}</td>
                                    @if (auth()->id() !== 1)
                                    <td>
                                        @if (str_contains($task->responsables, auth()->user()->username))
                                        <form action="{{ route('task.leaveGroup', ['task' => $task]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" class="ml-3">
                                                {{ __('Leave') }}
                                            </x-danger-button>
                                        </form> @else
                                        <form action="{{ route('task.joinGroup', ['task' => $task]) }}" method="POST">
                                            @csrf
                                            <x-secondary-button type="submit" class="ml-3">
                                                {{ __('Join') }}
                                            </x-secondary-button>
                                        </form>
                                        @endif
                                    </td>
                                    @endif


                                    @if (auth()->id() === 1)
                                    <td>
                                        <form action="{{ route('task.destroy', ['task' => $task]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <x-danger-button type="submit" class="ml-3">
                                                {{ __('Delete') }}
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
                        
                        <div class="modal fade" id="addNewModal" tabindex="-1" aria-labelledby="addNewModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title fw-bold" id="addNewModalLabel">{{ __('Add new task') }}
                                        </p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario para agregar nueva tarea -->
                                        <form action="{{ route('task.store') }}" method="POST">
                                            @csrf

                                            <div class="form-group mb-4">
                                                <x-input-label class="mb-2" for="descripcion"
                                                    :value="__('Descripción')" />
                                                <x-text-input id="descripcion" class="block mt-1 w-full" type="text"
                                                    name="descripcion" :value="old('descripcion')" required autofocus />
                                            </div>
                                            <div class="form-group">
                                                <x-input-label class="mb-2" for="dificultad"
                                                    :value="__('Dificultad')" />
                                                <div>
                                                    <x-input-label for="bajo" class="inline-flex items-center">
                                                        <x-text-input type="radio" name="dificultad" value="B"
                                                            id="bajo" />
                                                        <span class="ml-2">{{ __('Low') }}</span>
                                                    </x-input-label>
                                                    <x-input-label for="medio" class="inline-flex items-center ml-4">
                                                        <x-text-input type="radio" name="dificultad" value="M"
                                                            id="medio" />
                                                        <span class="ml-2">{{ __('Medium') }}</span>
                                                    </x-input-label>
                                                    <x-input-label for="alto" class="inline-flex items-center ml-4">
                                                        <x-text-input type="radio" name="dificultad" value="A"
                                                            id="alto" />
                                                        <span class="ml-2">{{ __('High') }}</span>
                                                    </x-input-label>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end mt-4">
                                                <x-primary-button class="ml-3">
                                                    {{ __('Aceptar') }}
                                                </x-primary-button>
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