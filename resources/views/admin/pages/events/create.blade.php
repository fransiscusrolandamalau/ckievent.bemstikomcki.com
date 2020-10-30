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
            {!! Form::open(['route' => 'events.store', 'method' => 'POST', 'files' => true]) !!}
            @include('admin.pages.events.partials.form-control', ['submit' => 'Save'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
