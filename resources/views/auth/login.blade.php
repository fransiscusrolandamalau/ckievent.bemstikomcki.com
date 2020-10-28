@extends('admin.layouts.main-auth', ['title' => 'Log in'])
@section('content')
    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}

        <div class="form-group mb-3">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="custom-control custom-control-alternative custom-checkbox">
            <input class="custom-control-input form-check-input" id=" customCheckLogin" type="checkbox" name="remember"{{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customCheckLogin">
                <span class="text-muted">Remember me</span>
            </label>
        </div>

        <div class="text-center">
            {!! Form::submit('Log in', ['class' => 'btn btn-info my-4 btn-block']) !!}
        </div>

    {!! Form::close() !!}
@endsection
