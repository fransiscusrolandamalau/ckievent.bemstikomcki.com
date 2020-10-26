@extends('admin.layouts.main-form')
@section('title', 'Payment Upload')
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
                    <a href="{{ route('re-registrations.index') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="col-6 text-right">
                    <h4>Payment Upload</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::model($registration, ['method' => 'PATCH', 'files' => true, 'route' => ['payment-upload.store', $registration->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <img src="{{ URL::to('/') }}/payment_upload/{{ $registration->payment_upload }}" class="img-payment_upload" width="100" />
                    <div class="form-group mt-1">
                        {!! Form::file('payment_upload', array('placeholder' => 'Payment Upload', 'class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
