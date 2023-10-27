<div class="card p-3 mb-2">
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-row align-items-center">
            <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
            <div class="ms-2 c-details">
                <h6 class="mb-0">Mailchimp</h6> <span>1 days ago</span>
            </div>
        </div>
        <div class="badge"> <span>Design</span> </div>
    </div>
    <div class="mt-5">
        <h3 class="heading">{{ $title  }}<br>Beneficio bebida y comida {{ $beneficio  }}</h3>
        <div class="mt-5">

            <div class="row">
                <!--barra hacia la izquierda-->
                <div class="col pe-0">
                    <div class="progress rounded-0 rounded-start border-dark border-end" style="direction: rtl;">
                        <div class="progress-bar bg-danger border-end-0" role="progressbar" style="width: 75%;"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
                <!--barra hacia la derecha-->
                <div class="col ps-0">
                    <div class="progress rounded-0 rounded-end border-dark border-start">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                </div>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <a href="#" class="btn btn-primary card-link">{{ __('Show more') }}</a>
            </div>

        </div>
    </div>
</div>

<!--<div class="card">
    <div class="card-content">
        <div class="card-body cleartfix">
            <div class="media align-items-stretch">
                <div class="align-self-center">
                    <h1 class="mr-2">$76,456.00</h1>
                </div>
                <div class="media-body">
                    <h4>Total Sales</h4>
                    <span>Monthly Sales Amount</span>
                </div>
                <div class="align-self-center">
                    <i class="icon-heart danger font-large-2"></i>
                </div>
            </div>
        </div>
    </div>
</div>-->