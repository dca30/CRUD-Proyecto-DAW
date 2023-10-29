@push('styles')
<link href="{{ asset('resources/css/card-component.css') }}" rel="stylesheet">
@endpush

<div class="card p-3 mb-4 shadow">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row align-items-center">
            <!--<div class="icon"> <i class="fa fa-regular fa-circle"></i> </div>-->
            <div class="ms-2 c-details">
                <div class="mb-0 h3 text-decoration-underline">{{ $title  }}</div> <span>18 Ago - 22 Ago</span>
            </div>
        </div>
        <div class="badge">
            <a href="{{ route('balance.info', ['balance' => $balance]) }}">
                <span>Show more</span>
            </a>
        </div>
    </div>
    <div class="mt-2 row">
    <div class="row g-2">
    <div class="col-4 d-flex justify-content-left align-items-center ps-4">
            @if ($nextBalance && !$nextBalance->total == null)
                @php
                    $percentage = number_format((($total - $nextBalance->total) / $nextBalance->total) * 100, 2);
                @endphp
                @if($percentage>0)
                <div class="badge-percentage-up">
                    <span class="fw-bold">
                        <i class="fa fa-arrow-up danger font-large-2"></i>+{{ $percentage }}%
                    </span>
                </div>
                @else
                <div class="badge-percentage-down">
                    <span class="fw-bold">
                        <i class="fa fa-arrow-down danger font-large-2"></i>{{ $percentage }}%
                    </span>
                </div>
                @endif
            @endif
            </div>
            <div class="col h1 heading fuente-montserrat">{{ $total  }}€</div>
        </div>
        <div class="mt-4">

            <div class="row">
                <!--barra hacia la izquierda-->
                <div class="col pe-0">
                    <div class="progress rounded-0 rounded-start border-dark border-end" style="direction: rtl;">
                        @if ($total<=0) <div class="progress-bar bg-danger border-end-0" role="progressbar"
                            style="width: {{ abs($total)*100/6000  }}%;" aria-valuemin="0" aria-valuemax="100">
                            {{ abs($total)  }}€
                    </div>
                    @else
                    <div class="progress-bar bg-danger border-end-0" role="progressbar" style="width: 0%;"
                        aria-valuemin="0" aria-valuemax="100">
                    </div>
                    @endif
                </div>
            </div>
            <!--barra hacia la derecha-->
            <div class="col ps-0">
                <div class="progress rounded-0 rounded-end border-dark border-start">
                    @if ($total>0)
                    <div class="progress-bar bg-success border-end-0" role="progressbar"
                        style="width: {{ $total*100/6000  }}%;" aria-valuemin="0" aria-valuemax="100"></div>
                    @else
                    <div class="progress-bar bg-success border-end-0" role="progressbar" style="width: 0%;"
                        aria-valuemin="0" aria-valuemax="100">
                    </div>
                    @endif
                </div>
            </div>
            <!--h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->
        </div>
    </div>
</div>
</div>