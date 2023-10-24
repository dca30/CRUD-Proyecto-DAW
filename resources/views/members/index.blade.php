<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-primary">Member</h1>
                        <div>
                            @if(session()->has('success'))
                            <div>
                                {{session('success')}}
                            </div>
                            @endif
                        </div>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Fee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member )
                                    <tr>
                                        <th scope="row">{{$member->id}}</th>
                                        <td>{{$member->first_name}}</td>
                                        <td>{{$member->last_name}}</td>
                                        <td>{{$member->phone_number}}</td>
                                        <td>{{$member->email}}</td>
                                        <td>{{$member->fee}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>