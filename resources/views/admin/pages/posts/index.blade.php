@extends('admin.layouts.main-datatables')
@section('title', 'Event')
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
                            <h3>Events</h3>
                        </div>
                        <div class="col-6 text-right">
                            @can('post-create')
                                <a class="btn btn-success btn-sm btn-round btn-icon" href="{{ route('posts.create') }}">
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
                                <th>#</th>
                                <th>Author</th>
                                <th>Event Title</th>
                                <th>Event Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->event_title }}</td>
                                <td>
                                    @if($post->event_status == false)
                                        <label class="badge badge-danger">Closed</label>
                                    @else
                                        <label class="badge badge-success">Open</label>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('event.show', $post->slug) }}" target="_blank" rel="noopener" ><i class="fa fa-eye"></i></a>
                                    @can('post-edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}"><i class="fas fa-user-edit"></i></a>
                                    @endcan
                                    @can('post-delete')
                                    {!! Form::open(array(
                                        'style' => 'display:inline-block',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Are you sure?');",
                                        'route' => ['posts.destroy', $post->id])) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
