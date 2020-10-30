<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group @if($errors->has('thumbnail')) has-error @endif">
            {!! Form::label('thumbnail', 'Upload pictures / posters / banners', ['class' => 'form-control-label']) !!}
            {!! Form::file('thumbnail', ['class' => 'form-control', 'id' => 'thumbnail']) !!}
            <h6 class="text-danger">Recommended 724 x 340px and no more than 2Mb</h6>
            @if ($errors->has('thumbnail'))
                <span class="text-danger">{!! $errors->first('thumbnail') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group @if($errors->has('event_title')) has-error @endif">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-tags"></i></span>
                </div>
                {!! Form::text('event_title', null, ['class' => 'form-control', 'placeholder' => 'Event Name']) !!}
            </div>
            @if ($errors->has('event_title'))
                <span class="text-danger">{!! $errors->first('event_title') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group @if($errors->has('event_title')) has-error @endif">
            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option disabled selected>Choose one!</option>
                @foreach ($categories as $category)
                    <option {{ $category->id == $events->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('event_title'))
                <span class="text-danger">{!! $errors->first('event_title') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group @if($errors->has('event_title')) has-error @endif">
            <select name="tags[]" id="tags" class="form-control select2 @error('tags') is-invalid @enderror" multiple>
                @foreach ($events->tags as $tag)
                    <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('event_title'))
                <span class="text-danger">{!! $errors->first('event_title') !!}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group @if($errors->has('location')) has-error @endif">
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
                {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location']) !!}
            </div>
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
                {!! Form::text('event_start', null, ['class' => 'form-control datepicker', 'placeholder' => 'Select date']) !!}
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
                {!! Form::text('start_time', null, ['class' => 'form-control timepicker', 'placeholder' => 'Select time']) !!}
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
                {!! Form::text('event_ends', null, ['class' => 'form-control datepicker', 'placeholder' => 'Select date']) !!}
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
                {!! Form::text('end_time', null, ['class' => 'form-control timepicker', 'placeholder' => 'Select time']) !!}
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
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group @if($errors->has('terms_and_conditions')) has-error @endif">
            {!! Form::label('terms_and_conditions', 'Terms and Conditions', ['class' => 'form-control-label']) !!}
            {!! Form::textarea('terms_and_conditions', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group @if($errors->has('contact_person')) has-error @endif">
            {!! Form::text('contact_person', null, ['class' => 'form-control', 'placeholder' => 'Contact Person']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if($errors->has('location')) has-error @endif">
            {!! Form::label('path_to', 'Path To', ['class' => 'form-control-label']) !!}
            {!! Form::text('path_to', null, ['class' => 'form-control']) !!}
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
{!! Form::submit($submit ?? 'Update', ['class' => 'btn btn-primary btn-block']) !!}
