@push('styles')
<link href="{{ asset('resources/css/card-idea.css') }}" rel="stylesheet">
@endpush

@if ($tematica == 'Comida y bebida')
@php $bg = 'bg-1'; @endphp
@elseif ($tematica == 'Prefiestas')
@php $bg = 'bg-2'; @endphp
@elseif ($tematica == 'Fiestas')
@php $bg = 'bg-3'; @endphp
@elseif ($tematica == 'Actividades')
@php $bg = 'bg-4'; @endphp
@endif



<div class="card p-3 mb-4 shadow {{ $bg }}">
    <div class="notif-card d-flex justify-content-between">
        <div class="d-flex flex-row align-items-center">
            <div class="ms-2 c-details">
                <div class="fw-bold mb-1 h4">{{ $titulo}}</div>
                <div>
                    @if(auth()->user()->username == 'admin')
                    @<span class="">{{  $creador  }}</span>
                    @elseif ($anonimo=='N')
                    @<span>{{  $creador  }}</span>
                    @elseif ($anonimo == 'S')
                    @if($creador == auth()->user()->username)
                    @<span>{{  $creador  }}</span>
                    @else
                    @<span>****</span>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        {{-- @if ($creador==auth()->user()->username)
        <x-secondary-button>
            <i class="fa fa-pencil"></i>
        </x-secondary-button>
        @endif --}}

        @if (auth()->id() == 1 && ($vista=='N'))
        <div class="badge-idea"
            onclick="event.preventDefault(); document.getElementById('update-form-{{ $id }}').submit();">
            <span class="bg-mi-color">1</span>
        </div>
        <form id="update-form-{{ $id }}" action="{{ route('idea.update', ['idea' => $id]) }}" method="POST"
            style="display: none;">
            @csrf
            @method('PUT')
        </form>
        @endif

    </div>
    <div class="row">
        <div class="col fuente-montserrat px-4 py-2">
            <p>{{ $descripcion  }}</p>
        </div>
    </div>
    <div class="row ">
        <div class="col badge">
            <span><abbr title="{{  $tematica  }}">{{ substr($tematica,0,1)  }}</span>
        </div>
        <div class="col justify-content-end text-end">
            {{ substr($fecha, 0, 10)}}
        </div>
    </div>
</div>