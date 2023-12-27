<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Balance') }} > {{ __('Summary chart') }}
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
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="container h-50 px-4 mx-auto">
                <div class="p-6 my-15 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>
            </div>
            <script src="{{ $chart->cdn() }}"></script>
            {{ $chart->script() }}
        </div>
    </div>


</x-app-layout>