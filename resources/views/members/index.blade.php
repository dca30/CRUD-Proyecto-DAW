<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
        <div></div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('First Name') }}</th>
                                    <th scope="col">{{ __('Last Name') }}</th>
                                    <th scope="col">{{ __('Phone') }}</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">{{ __('Residence') }}</th>
                                    <th scope="col">{{ __('Fee (€/6 months)') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $member )
                                <tr>
                                    <th scope="row">{{$member->id}}</th>
                                    <td>{{$member->nombre}}</td>
                                    <td>{{$member->apellidos}}</td>
                                    <td>{{$member->telefono}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->domicilio}}</td>
                                    <td>{{$member->cuota}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>