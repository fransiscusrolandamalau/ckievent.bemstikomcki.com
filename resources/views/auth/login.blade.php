@extends('admin.layouts.main-auth')
@section('title', 'Sign in')
@section('content')
    <div class="text-center text-muted mb-4">
        <h3>Sign in</h3>
    </div>
    <form method="POST" action="{{ route('login') }}" role="form">
        @csrf
        <div class="form-group mb-3">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                <input placeholder="Password" id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="custom-control custom-control-alternative custom-checkbox">
            <input class="custom-control-input form-check-input" id=" customCheckLogin" type="checkbox" name="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customCheckLogin">
                <span class="text-muted">Remember me</span>
            </label>
        </div>
            @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
            @endif

        <div class="text-center">
            <button type="submit" class="btn btn-primary my-4">
                {{ __('Sign in') }}
            </button>
        </div>
    </form>
@endsection
