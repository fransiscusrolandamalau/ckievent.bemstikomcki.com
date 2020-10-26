@extends('admin.layouts.main-form')
@section('title', 'Add Event')
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
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="col-6 text-right">
                    <h4>Add Event</h4>
                </div>
            </div>
        </div>

        <div class="card-body">
            {!! Form::open(array('route' => 'posts.store', 'method' => 'POST', 'files' => true)) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('event_title', 'Event Title', ['class' => 'form-control-label']) !!}
                        {!! Form::text('event_title', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('location', 'Location', ['class' => 'form-control-label']) !!}
                        {!! Form::text('location', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('event_start', 'Event Start', ['class' => 'form-control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            {!! Form::date('event_start', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('start_time', 'Start Time', ['class' => 'form-control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            {!! Form::text('start_time', null, array('class' => 'form-control timepicker')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('event_ends', 'Event Ends', ['class' => 'form-control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            {!! Form::date('event_ends', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('end_time', 'End Time', ['class' => 'form-control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            {!! Form::text('end_time', null, array('class' => 'form-control timepicker')) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('thumbnail', 'Thumbnail', ['class' => 'form-control-label']) !!}
                        {!! Form::file('thumbnail', array('class' => 'form-control')) !!}
                            <h6 class="text-red">Recommended width=750px min height=501px</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('content', 'Description', ['class' => 'form-control-label']) !!}
                        {!! Form::textarea('content', null, array('class' => 'form-control', 'id' => 'description-textarea')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('contact', 'Contact', ['class' => 'form-control-label']) !!}
                        {!! Form::text('contact', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('path_to', 'Path To', ['class' => 'form-control-label']) !!}
                        {!! Form::text('path_to', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('payment_status', 'Payment Status', ['class' => 'form-control-label']) !!}
                        {!! Form::select('payment_status', ["1" => 'Paid', "0" => 'Free Payment'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('is_published', 'Status', ['class' => 'form-control-label']) !!}
                        {!! Form::select('is_published', ["1" => 'Published', "0" => 'Draft'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('event_status', 'Event Status', ['class' => 'form-control-label']) !!}
                        {!! Form::select('event_status', ["1" => 'Open', "0" => 'Closed'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            {!! Form::submit('Save post', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
