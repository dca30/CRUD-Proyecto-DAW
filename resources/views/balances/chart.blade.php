<body class="h-screen bg-gray-100">

</body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Balance') }}
        </h2>
    </x-slot>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container px-4 mx-auto">
    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>
</div>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
        </div>
    </div>


</x-app-layout>