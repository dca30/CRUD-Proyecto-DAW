@push('styles')
<link href="{{ asset('resources/css/card-balance.css') }}" rel="stylesheet">
@endpush
<div class="floating-card-bank col pb-0 px-6 ms-3 bg-white rounded shadow d-none d-xxl-block d-xl-none">
    <div class="rounded shadow p-2 bg-2">
        <h5 class="card-title mb-1">ES00 **** **** **** **** 1234</h5>
        <h6 class="card-subtitle mb-2 text-muted">Titular: Juan Pérez</h6>
        <p class="fw-bold fs-1 text-center">4823.72€</p>
    </div>
    <table class=" text-center table mt-3 table-borderless">
        <thead>
            <tr>
                <th scope="col">Info</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><abbr title="Discomovil MC"><i class="fa fa-info-circle"></i></abbr></td>
                <td>30-Ago-2023</td>
                <td>-1500€</td>

            </tr>
            <tr>
                <td><abbr title="Bebidas Proveedor"><i class="fa fa-info-circle"></i></abbr></td>
                <td>15-Ago-2023</td>
                <td>-2800€</td>
            </tr>
            <tr>
                <td><abbr title="Cuota Socios"><i class="fa fa-info-circle"></i></abbr></td>
                <td>15-Sept-2023</td>
                <td>+300€</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="floating-card col pb-0 px-6 me-3 bg-white rounded shadow d-none d-xxl-block d-xl-none">
    {!! $chartData->container() !!}
</div>
<script src="{{ $chartData->cdn() }}"></script>
{{ $chartData->script() }}