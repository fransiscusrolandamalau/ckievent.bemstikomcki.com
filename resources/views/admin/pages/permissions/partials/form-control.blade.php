<div class="row">
    <div class="col-xl-2"></div>
    <div class="col-xl-8">
        <div class="my-5">
            <div class="form-group row @if($errors->has('name')) has-error @endif">
                {!! Form::label('name', 'Name', ['class' => 'col-3']) !!}
                <div class="col-9">
                    {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control form-control-solid')) !!}
                    @if ($errors->has('name'))
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row @if($errors->has('guard_name')) has-error @endif">
                {!! Form::label('guard_name', 'Guard Name', ['class' => 'col-3']) !!}
                <div class="col-9">
                    {!! Form::text('guard_name', null, array('placeholder' => 'Guard Name', 'class' => 'form-control form-control-solid')) !!}
                    @if ($errors->has('guard_name'))
                        <span class="text-danger">{!! $errors->first('guard_name') !!}</span>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
    </div>
</div>
