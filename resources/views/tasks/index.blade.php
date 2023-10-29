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
                                    @foreach($tasks as $task )
                                    <tr>
                                        <th scope="row">{{  $counter  }}</th>
                                        <td>{{$task->descripcion}}</td>
                                        <td>
                                            @if ($task->dificultad === 'B')
                                            <i class="fa fa-regular fa-circle text-success"></i> <!-- Verde -->
                                            @elseif ($task->dificultad === 'M')
                                            <i class="fa fa-regular fa-circle text-warning"></i> <!-- Amarillo -->
                                            @elseif ($task->dificultad === 'A')
                                            <i class="fa fa-regular fa-circle text-danger"></i> <!-- Rojo -->
                                            @endif
                                        </td>
                                        <td>{{$task->responsables}}</td>
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
                                    </tr>
                                    @php
                                    $counter++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('balance.create') }}">
                                @if (auth()->id() === 1)

                                <x-success-button>
                                    {{ __('Add new') }}
                                </x-success-button>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>