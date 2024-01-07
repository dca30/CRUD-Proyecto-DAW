@push('styles')
<link href="{{ asset('resources/css/card-balance.css') }}" rel="stylesheet">
@endpush

                                @if($maxYear==$balance->year)
<div class="card card-important p-3 mb-4">

    @else
    <div class="card p-3 mb-4 shadow">
        @endif
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <!--<div class="icon"> <i class="fa fa-regular fa-circle"></i> </div>-->
                <div class="ms-2 c-details">
                    <div class="mb-0 h3 fw-bold">{{ $title  }}</div>
                    <span>{{ substr($balance->fechas, 0, 2)}} - {{ substr($balance->fechas, 2, 2)}}
                        {{ __('Augost') }}</span>
                </div>
            </div>
            <div class="">
                <a href="{{ route('balance.info', ['balance' => $balance]) }}">
                    <x-button-accept-secondary>{{ __('Show more') }}</x-button-accept-secondary>
                </a>
            </div>
        </div>
        <div class="mt-2 row">
            <div class="row g-2">
                <div class="col-4 d-flex justify-content-left align-items-center ps-4">

                    @if($balance->incremento>0)
                    <div class="badge-percentage-up">
                        <span class="fw-bold">
                            <i class="fa fa-arrow-up danger font-large-2"></i>+{{ $balance->incremento }}%
                        </span>
                    </div>
                    @elseif($balance->incremento<0) <div class="badge-percentage-down">
                        <span class="fw-bold">
                            <i class="fa fa-arrow-down danger font-large-2"></i>{{ $balance->incremento }}%
                        </span>
                </div>
                @endif
            </div>
            <div class="col h1 heading">{{ $total  }}€</div>
        </div>
        <div class="mt-4">

            <div class="row">
                <!--barra hacia la izquierda-->
                <div class="col pe-0">
                    <div class="progress rounded-0 rounded-start border-dark border-end" style="direction: rtl;">
                        @if ($total<=0) <div class="progress-bar bg-red border-end-0" role="progressbar"
                            style="width: {{ abs($total)*100/6000  }}%;" aria-valuemin="0" aria-valuemax="100">
                    </div>
                    @else
                    <div class="progress-bar bg-red border-end-0" role="progressbar" style="width: 0%;"
                        aria-valuemin="0" aria-valuemax="100">
                    </div>
                    @endif
                </div>
            </div>
            <!--barra hacia la derecha-->
            <div class="col ps-0">
                <div class="progress rounded-0 rounded-end border-dark border-start">
                    @if ($total>0)
                    <div class="progress-bar bg-green border-end-0" role="progressbar"
                        style="width: {{ $total*100/6000  }}%;" aria-valuemin="0" aria-valuemax="100"></div>
                    @else
                    <div class="progress-bar bg-green border-end-0" role="progressbar" style="width: 0%;"
                        aria-valuemin="0" aria-valuemax="100">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>