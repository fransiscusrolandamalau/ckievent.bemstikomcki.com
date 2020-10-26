@extends('front.layouts.main')
@section('content')
    <div class="error-section">
        <div class="d-table">
            <div class="d-tablecell">
                <h1>404!</h1>
                <h3>Oops! Page Not Found</h3>
                <p>The page you were looking for could not be found.</p>
                <a href="{{ url('/') }}" class="back-button">Return Home page</a>
            </div>
        </div>
    </div>
@endsection
