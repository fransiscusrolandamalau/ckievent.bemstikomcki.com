@extends('admin.layouts.main')
@section('stylesheet')
    <link rel="stylesheet" href="{{ mix('/admin/css/forms.css') }}" />
@endsection
@section('content')
    @yield('body')
@endsection
@push('js')
    <script src="{{ mix('/admin/js/forms.js') }}"></script>
    <script  type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('.timepicker').datetimepicker({
                format: 'LT',
                icons: {
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                }
            });
        });
    </script>
    <script type="text/javascript">
        $("#status").change(function() {
        if ($(this).val() == "umum") {
            $('#instansi').show();
            $('#kelas').hide();
            $('#semester').hide();
            $('#instansiField').attr('required', '');
            $('#instansiField').attr('data-error', 'This field is required.');
            $('#kelasField').removeAttr('required');
            $('#kelasField').removeAttr('data-error');
            $('#semesterField').removeAttr('required');
            $('#semesterField').removeAttr('data-error');
        } else {
            $('#instansi').hide();
            $('#kelas').show();
            $('#semester').show();
            $('#kelasField').attr('required', '');
            $('#kelasField').attr('data-error', 'This field is required.');
            $('#semesterField').attr('required', '');
            $('#semesterField').attr('data-error', 'This field is required.');
            $('#instansiField').removeAttr('required');
            $('#instansiField').removeAttr('data-error');
        }
        });
        $("#status").trigger("change");
    </script>
@endpush
