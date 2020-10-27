@extends('admin.layouts.main')
@section('stylesheet')
    <link href="{{ mix('admin/css/vendor-datatables.css') }}" rel="stylesheet">
@endsection
@section('content')
    @yield('body')
    @yield('modal')
@endsection
@push('js')
    <script type="text/javascript" src="{{ mix('admin/js/vendor-datatables.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                responsive: true,
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>",
                    },
                },
                columnDefs: [
                    { "orderable": false, "targets": 'no-orderable' }
                ]
            });
        });
    </script>
@stack('custom')
@endpush
