<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
    <h1 class="text-primary">Member</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th class="text-primary">First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Fee</th>
            </tr>
            @foreach($members as $member )
            <tr>
                <td>{{$member->first_name}}</td>
                <td>{{$member->last_name}}</td>
                <td>{{$member->phone_number}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->fee}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>