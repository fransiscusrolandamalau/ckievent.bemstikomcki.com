@extends('admin.layouts.main-datatables')
@section('title', 'Permissions')
@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Data Permissions</h3>
                        </div>
                        <div class="col-6 text-right">
                            @can('post-create')
                                <a href="{{ route('permissions.create') }}" class="btn btn-icon btn-primary btn-sm">
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
                                <th style="width: 1px;">#</th>
                                <th class="no-orderable">Name</th>
                                <th class="no-orderable">Guard Name</th>
                                <th class="no-orderable" style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>
                                    @can('post-edit')
                                    <a class="btn btn-secondary btn-sm" href="{{ route('permissions.edit', $permission->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('post-delete')
                                    {!! Form::open(array(
                                        'style' => 'display:inline-block',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Are you sure?');",
                                        'route' => ['permissions.destroy', $permission->id])) !!}
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
