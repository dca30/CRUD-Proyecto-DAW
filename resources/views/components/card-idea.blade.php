@push('styles')
<link href="{{ asset('resources/css/card-component.css') }}" rel="stylesheet">
@endpush

<div class="card p-3 mb-4 shadow">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row align-items-center">
            <!--<div class="icon"> <i class="fa fa-regular fa-circle"></i> </div>-->
            <div class="ms-2 c-details">
                <div class="mb-0 h3 text-decoration-underline">2000</div>
                <span>15 Ago - 20 Ago</span>
            </div>
        </div>
        <div class="badge">
            <a href="#">
                <span>Show more</span>
            </a>
        </div>
    </div>
    <div class="mt-2 row">
        <div class="row g-2">
            <div class="col-4 d-flex justify-content-left align-items-center ps-4">

                <div class="badge-percentage-up">
                    <span class="fw-bold">
                        <i class="fa fa-arrow-up danger font-large-2"></i>+50%
                    </span>
                </div>
            </div>
            <div class="col h1 heading fuente-montserrat">8000€</div>
        </div>
    </div>
</div>
</div>