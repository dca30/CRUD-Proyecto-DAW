<!-- resources/views/components/user-table.blade.php -->

@props(['data'])

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col" class="ps-4">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href='/admin/edit/{{ $user->id }}'>
                    <x-secondary-button class="ml-3">
                        <i class="fa fa-pencil"></i>
                    </x-secondary-button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>