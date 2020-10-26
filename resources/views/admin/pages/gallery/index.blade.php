@extends('admin.layouts.main-datatables')
@section('title', 'Gallery')
@section('body')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Success!</strong> {{ $message }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Gallery</h3>
                        </div>
                        <div class="col-6 text-right">
                            @can('post-create')
                                <a class="btn btn-success btn-sm btn-round btn-icon" href="{{ url('/a/gallery/create') }}">
                                  <span class="btn-inner--text"><i class="fa fa-plus"></i></span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-striped table-bordered data-table" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>Image</th>
                                <th>Filename</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($photos as $photo)
                            <tr>
                                <td><img src="/gallery/{{ $photo->resized_name }}"></td>
                                <td>{{ $photo->original_name }}</td>
                                <td>
                                    {!! Form::open([
                                            'style' => 'display:inline-block',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('Are you sure?');",
                                            'route' => ['image-delete', $photo->id]]) !!}
                                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                     
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection