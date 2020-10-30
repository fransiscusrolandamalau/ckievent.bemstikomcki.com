@extends('admin.layouts.main-form')
@section('title', 'Edit Event')
@section('body')
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('events.index') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="col-6 text-right">
                    <h4>Edit Event</h4>
                </div>
            </div>
        </div>

        <div class="card-body">
            {!! Form::model($events, ['method' => 'PATCH', 'files' => true, 'route' => ['events.update', $events->id]]) !!}
            @include('admin.pages.events.partials.form-control')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
