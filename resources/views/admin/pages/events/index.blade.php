@extends('admin.layouts.main-datatables')
@section('title', 'Event')
@section('body')
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
                                <a href="{{ route('events.create') }}" class="btn btn-icon btn-primary btn-sm">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text">Add New @yield('title')</span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-striped table-bordered table-hover data-table" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th class="no-orderable">Thumbnail</th>
                                <th class="no-orderable">Event Name</th>
                                <th class="no-orderable">Author</th>
                                <th class="no-orderable">Status</th>
                                <th class="no-orderable">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $key => $post)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <a class="avatar mr-3" href="{{ asset('thumbnail/'.$post->thumbnail) }}" target="_blank">
                                        <img style="object-fit: cover; object-position: center;" src="{{ asset('thumbnail/'.$post->thumbnail) }}">
                                    </a>
                                </td>
                                <td>{{ $post->event_title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>
                                    @if($post->event_status == false)
                                        <label class="badge badge-pill badge-danger">Closed</label>
                                    @else
                                        <label class="badge badge-pill badge-success">Open</label>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="{{ route('event.show', $post->slug) }}" target="_blank" rel="noopener" data-toggle="tooltip" data-placement="top" title="Show" ><i class="fa fa-eye"></i></a>
                                    @can('post-edit')
                                    <a class="btn btn-secondary btn-sm" href="{{ route('events.edit', $post->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('post-delete')
                                    {!! Form::open(array(
                                        'style' => 'display:inline-block',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Are you sure?');",
                                        'route' => ['events.destroy', $post->id])) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-secondary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Delete']) !!}
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
