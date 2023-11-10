@push('styles')
<link href="{{ asset('resources/css/card-idea.css') }}" rel="stylesheet">
@endpush

@if ($tematica == 'A')
@php $bg = 'bg-1'; @endphp
@elseif ($tematica == 'B')
@php $bg = 'bg-2'; @endphp
@else
@php $bg = 'bg-3'; @endphp
@endif



<div class="card p-3 mb-4 shadow {{ $bg }}">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row align-items-center">
            <div class="ms-2 c-details">
                <div class="mb-0 h3 text-decoration-underline"></div>
                <span>{{  $creador  }}</span>
            </div>
        </div>
        @if ($creador==auth()->user()->username)
        <x-secondary-button>
            <i class="fa fa-pencil"></i>
        </x-secondary-button>
        @endif
        @if (auth()->id() == 1)
        <form action="{{ route('idea.updateVista', ['idea' => $id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <x-secondary-button type="submit">
                <i class="fa fa-check"></i>
            </x-secondary-button>
        </form>
        @if($vista==1)
        <div class="badge-idea">
            <span class="bg-danger">1</span>
        </div>
        @endif
        @endif
        <div class="badge">
            <span>{{ $tematica  }}</span>
        </div>
    </div>
    <div class="mt-2 row">

        <div class="col fuente-montserrat p-4">
            <p>{{ $descripcion  }}</p>
        </div>
    </div>
</div>