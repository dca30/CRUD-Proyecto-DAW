@push('styles')
<link href="{{ asset('resources/css/card-balance.css') }}" rel="stylesheet">
@endpush
<div class="floating-card col pb-0 px-6 me-3 bg-white rounded shadow d-none d-xxl-block d-xl-none">
    {!! $chartData->container() !!}
</div>
<script src="{{ $chartData->cdn() }}"></script>
{{ $chartData->script() }}