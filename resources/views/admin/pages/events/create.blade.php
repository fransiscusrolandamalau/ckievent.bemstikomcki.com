@extends('admin.layouts.main-form', ['title' => 'Add Event'])
@section('body')
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('events.index') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="col-6 text-right">
                    <h4>Add Event</h4>
                </div>
            </div>
        </div>

        <div class="card-body">
            {!! Form::open(array('route' => 'events.store', 'method' => 'POST', 'files' => true)) !!}

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group @if($errors->has('event_title')) has-error @endif">
                        {!! Form::text('event_title', null, ['class' => 'form-control', 'placeholder' => 'Event Name']) !!}
                        @if ($errors->has('event_title'))
                            <span class="text-danger">{!! $errors->first('event_title') !!}</span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                        {!! Form::text('location', null, array('class' => 'form-control', 'placeholder' => 'Location')) !!}
                        @if ($errors->has('location'))
                            <span class="text-danger">{!! $errors->first('location') !!}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group @if($errors->has('event_start')) has-error @endif">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            {!! Form::text('event_start', null, array('class' => 'form-control datepicker', 'placeholder' => 'Select date')) !!}
                        </div>
                        @if ($errors->has('event_start'))
                            <span class="text-danger">{!! $errors->first('event_start') !!}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group @if($errors->has('start_time')) has-error @endif">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            {!! Form::text('start_time', null, array('class' => 'form-control timepicker', 'placeholder' => 'Select time')) !!}
                        </div>
                        @if ($errors->has('start_time'))
                            <span class="text-danger">{!! $errors->first('start_time') !!}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group @if($errors->has('event_ends')) has-error @endif">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            {!! Form::text('event_ends', null, array('class' => 'form-control datepicker', 'placeholder' => 'Select date')) !!}
                        </div>
                        @if ($errors->has('event_ends'))
                            <span class="text-danger">{!! $errors->first('event_ends') !!}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group @if($errors->has('end_time')) has-error @endif">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            {!! Form::text('end_time', null, array('class' => 'form-control timepicker', 'placeholder' => 'Select time')) !!}
                        </div>
                        @if ($errors->has('end_time'))
                            <span class="text-danger">{!! $errors->first('end_time') !!}</span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group @if($errors->has('thumbnail')) has-error @endif">
                        {!! Form::label('thumbnail', 'Thumbnail', ['class' => 'form-control-label']) !!}
                        {!! Form::file('thumbnail', array('class' => 'form-control')) !!}
                            <h6 class="text-red">Recommended width=750px min height=501px</h6>
                        @if ($errors->has('thumbnail'))
                            <span class="text-danger">{!! $errors->first('thumbnail') !!}</span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                        <div class="dropzone dropzone-single mb-3" data-toggle="dropzone" data-dropzone-url="http://">
                            <div class="fallback">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="projectCoverUploads">
                                    <label class="custom-file-label" for="projectCoverUploads">Choose file</label>
                                </div>
                            </div>
                            <div class="dz-preview dz-preview-single">
                                <div class="dz-preview-cover">
                                    <img class="dz-preview-img" src="..." alt="..." data-dz-thumbnail>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                        {!! Form::label('content', 'Description', ['class' => 'form-control-label']) !!}
                        {!! Form::textarea('content', null, array('class' => 'form-control', 'data-toggle' => 'quill', 'data-quill-placeholder' => 'Quill WYSIWYG')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                        {!! Form::label('contact', 'Contact', ['class' => 'form-control-label']) !!}
                        {!! Form::text('contact', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                        {!! Form::label('path_to', 'Path To', ['class' => 'form-control-label']) !!}
                        {!! Form::text('path_to', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                        {!! Form::label('payment_status', 'Payment Status', ['class' => 'form-control-label']) !!}
                        {!! Form::select('payment_status', ["1" => 'Paid', "0" => 'Free Payment'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                        {!! Form::label('is_published', 'Status', ['class' => 'form-control-label']) !!}
                        {!! Form::select('is_published', ["1" => 'Published', "0" => 'Draft'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group @if($errors->has('location')) has-error @endif">
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
