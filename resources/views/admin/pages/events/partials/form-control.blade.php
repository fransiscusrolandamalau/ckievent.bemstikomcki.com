<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group @if($errors->has('thumbnail')) has-error @endif">
            @isset($events->thumbnail)
            {!! Html::image('/storage/' . $events->thumbnail, null, ['class'=>'img-thumbnail', 'width' => '150px', 'style' => 'object-fit: cover; object-position: center;']) !!} <br>
            @endisset
            {!! Form::label('thumbnail', 'Upload pictures / posters / banners', ['class' => 'form-control-label']) !!}
            {!! Form::file('thumbnail', ['class' => 'form-control', 'id' => 'thumbnail']) !!}
            <h6 class="text-danger">Recommended 724 x 340px and no more than 2Mb</h6>
            @if ($errors->has('thumbnail'))
                <span class="text-danger">{!! $errors->first('thumbnail') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-5 col-sm-5 col-md-5">
        <div class="form-group @if($errors->has('event_title')) has-error @endif">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-tags"></i></span>
                </div>
                {!! Form::text('event_title', null, ['class' => 'form-control', 'placeholder' => 'Event Name *']) !!}
            </div>
            @if ($errors->has('event_title'))
                <span class="text-danger">{!! $errors->first('event_title') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group @if($errors->has('event_title')) has-error @endif">
            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option disabled selected>Choose Category *</option>
                @foreach ($categories as $category)
                    <option {{ $category->id == $events->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('event_title'))
                <span class="text-danger">{!! $errors->first('event_title') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group @if($errors->has('location')) has-error @endif">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location *']) !!}
            </div>
            <h6 class="text-danger">Please input your location: Event Online or Google maps link</h6>
            @if ($errors->has('location'))
                <span class="text-danger">{!! $errors->first('location') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group @if($errors->has('event_start')) has-error @endif">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                {!! Form::text('event_start', null, ['class' => 'form-control datepicker', 'data-date-format' => 'yyyy-mm-dd', 'placeholder' => 'Start Date *']) !!}
            </div>
            @if ($errors->has('event_start'))
                <span class="text-danger">{!! $errors->first('event_start') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group @if($errors->has('start_time')) has-error @endif">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-clock"></i></span>
                </div>
                {!! Form::text('start_time', null, ['class' => 'form-control timepicker', 'placeholder' => 'Starting Time *']) !!}
            </div>
            @if ($errors->has('start_time'))
                <span class="text-danger">{!! $errors->first('start_time') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group @if($errors->has('event_ends')) has-error @endif">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                {!! Form::text('event_ends', null, ['class' => 'form-control datepicker', 'data-date-format' => 'yyyy-mm-dd', 'placeholder' => 'End Date *']) !!}
            </div>
            @if ($errors->has('event_ends'))
                <span class="text-danger">{!! $errors->first('event_ends') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group @if($errors->has('end_time')) has-error @endif">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-clock"></i></span>
                </div>
                {!! Form::text('end_time', null, ['class' => 'form-control timepicker', 'data-time-format' => 'H:i:s', 'placeholder' => 'End Time *']) !!}
            </div>
            @if ($errors->has('end_time'))
                <span class="text-danger">{!! $errors->first('end_time') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group @if($errors->has('description')) has-error @endif">
            {!! Form::label('description', 'Description', ['class' => 'form-control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            @if ($errors->has('description'))
                <span class="text-danger">{!! $errors->first('description') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group @if($errors->has('terms_and_conditions')) has-error @endif">
            <a class="form-control-label" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
                <span class="btn-inner--text">Terms and Conditions</span>
            </a>
            <div id="collapseExample" class="collapse">
                {!! Form::textarea('terms_and_conditions', null, ['class' => 'form-control']) !!}
            </div>
            @if ($errors->has('terms_and_conditions'))
                <span class="text-danger">{!! $errors->first('terms_and_conditions') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group @if($errors->has('contact_person')) has-error @endif">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                {!! Form::text('contact_person', null, ['class' => 'form-control', 'placeholder' => 'Contact Person *']) !!}
            </div>
            @if ($errors->has('contact_person'))
                <span class="text-danger">{!! $errors->first('contact_person') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group @if($errors->has('path_to')) has-error @endif">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-link"></i></span>
                </div>
                {!! Form::text('path_to', null, ['class' => 'form-control', 'placeholder' => 'URL Streaming/Group *']) !!}
            </div>
            @if ($errors->has('path_to'))
                <span class="text-danger">{!! $errors->first('path_to') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group @if($errors->has('payment_status')) has-error @endif">
            {!! Form::select('payment_status', ["1" => 'Paid', "0" => 'Free Payment'], null, ['class' => 'form-control', 'placeholder' => 'Status Tiket *']) !!}
            @if ($errors->has('payment_status'))
                <span class="text-danger">{!! $errors->first('payment_status') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group @if($errors->has('event_status')) has-error @endif">
            {!! Form::select('event_status', ["1" => 'Open', "0" => 'Closed'], null, ['class' => 'form-control', 'placeholder' => 'Status Event *']) !!}
            @if ($errors->has('event_status'))
                <span class="text-danger">{!! $errors->first('event_status') !!}</span>
            @endif
        </div>
    </div>
    @role('Super Admin')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group @if($errors->has('is_published')) has-error @endif">
                {!! Form::select('is_published', ["1" => 'Published', "0" => 'Draft'], null, ['class' => 'form-control']) !!}
                @if ($errors->has('is_published'))
                    <span class="text-danger">{!! $errors->first('is_published') !!}</span>
                @endif
            </div>
        </div>
    @endrole
</div>
{!! Form::submit($submit ?? 'Update', ['class' => 'btn btn-primary btn-block']) !!}
