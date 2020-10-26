@extends('admin.layouts.main-form')
@section('title', 'Add User')
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
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="col-6 text-right">
                    <h4>Add User</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'users.store', 'method' => 'POST', 'files' => true)) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'form-control-label']) !!}
                        {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'form-control-label']) !!}
                        {!! Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('password', 'Password', ['class' => 'form-control-label']) !!}
                        {!! Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('confirm-password', 'Confirm Password', ['class' => 'form-control-label']) !!}
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password', 'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('roles', 'Roles', ['class' => 'form-control-label']) !!}
                        {!! Form::select('roles[]', $roles, [], array('class' => 'form-control select2', 'multiple')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::label('avatar', 'Avatar', ['class' => 'form-control-label']) !!}
                        {!! Form::file('avatar', array('placeholder' => 'Avatar', 'class' => 'form-control', 'id' => 'avatar')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
