@extends('front.layouts.main')
@section('banner')
    <div class="page-banner banner-bg-one">
        <div class="container">
            <div class="banner-text">
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="register-section pt-100 pb-180">
        <div class="container">
            <div class="register-form box-content">
                <h3 class="title">Register Now</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whooops!</strong> There were some problems with your input. <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Success!</strong> {{ $message }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {!! Form::open(array('route' => 'event-registration.store', 'method' => 'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('full_name', 'Full Name', ['class' => 'form-control-label']) !!}
                            {!! Form::text('full_name', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('email', 'Email Address', ['class' => 'form-control-label error("email") is-invalid @enderror']) !!}
                            {!! Form::text('email', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('phone_number', 'Phone Number', ['class' => 'form-control-label']) !!}
                            {!! Form::text('phone_number', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('event_name', 'Pick Event', ['class' => 'form-control-label']) !!}
                            {!! Form::select('event_name',$posts,null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('status', 'Pick a status', ['class' => 'form-control-label']) !!}
                            {!! Form::select('status', ['umum' => 'Umum', 'internal' => 'STIKOM CKI Student'], null, ['class' => 'form-control', 'id' => 'status']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" id="instansi">
                        <div class="form-group">
                            {!! Form::label('instansi', 'Instansi/School/University', ['class' => 'form-control-label']) !!}
                            {!! Form::text('instansi', null, array('class' => 'form-control', 'id' => 'instansiField')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('nim', 'NIP/NIM/NIS', ['class' => 'form-control-label']) !!}
                            {!! Form::text('nim', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-md-6" id="kelas">
                        <div class="form-group">
                            {!! Form::label('kelas', 'Class', ['class' => 'form-control-label']) !!}
                            {!! Form::select('kelas', ['Reguler Pagi' => 'Reguler Pagi', 'Reguler Malam' => 'Reguler Malam', 'Sabtu' => 'Sabtu', 'Minggu' => 'Minggu'], null, ['placeholder' => 'Class', 'class' => 'form-control', 'id' => 'kelasField']) !!}
                        </div>
                    </div>
                    <div class="col-md-6" id="semester">
                        <div class="form-group">
                            {!! Form::label('semester', 'Semester', ['class' => 'form-control-label']) !!}
                            {!! Form::select('semester', ['I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV', 'V' => 'V', 'VI' => 'VI', 'VII' => 'VII', 'VIII' => 'VIII'], null, ['placeholder' => 'Semester', 'class' => 'form-control', 'id' => 'semesterField']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            {!! Form::label('info', 'How did you know about this event?', ['class' => 'form-control-label']) !!}
                            {!! Form::select('info', ['Facebook' => 'Facebook', 'Instagram' => 'Instagram', 'Google' => 'Google', 'Twitter' => 'Twitter', 'Website' => 'Website', 'Friend / Family' => 'Friend / Family', 'Other' => 'Other'], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::submit('Register Now', ['class' => 'btn default-btn btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
@push('js')
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
