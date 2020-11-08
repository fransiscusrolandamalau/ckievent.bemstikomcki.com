@extends('admin.layouts.main-form', ['title' => 'Add Permission'])
@section('body')
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="col-6 text-right">
                    <h4>Add Permission</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'permissions.store', 'method' => 'POST']) !!}
                @include('admin.pages.permissions.partials.form-control', ['submit' => 'Save'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
