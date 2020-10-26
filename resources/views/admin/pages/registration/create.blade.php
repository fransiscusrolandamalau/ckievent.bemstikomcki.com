@extends('admin.layouts.main-form')
@section('title', 'Add User Register')
@section('body')
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
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('registrations.index') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="col-6 text-right">
                    <h4>Add User Register</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'registrations.store', 'method' => 'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('full_name', 'Full Name', ['class' => 'form-control-label']) !!}
                        {!! Form::text('full_name', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('email', 'Email Address', ['class' => 'form-control-label']) !!}
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
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('payment_confirmation', 'Payment Confirmation', ['class' => 'form-control-label']) !!}
                        {!! Form::select('payment_confirmation', ["1" => 'Success', "0" => 'Failed'], null, ['placeholder' => 'Status', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('payment_upload', 'Payment Upload', ['class' => 'form-control-label']) !!}
                        {!! Form::file('payment_upload', array('placeholder' => 'Payment Upload', 'class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
