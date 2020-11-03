@extends('admin.layouts.main-datatables')
@section('title', 'Category')
@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Category</h3>
                        </div>
                        <div class="col-6 text-right">
                            @can('post-create')
                                <a href="{{ route('categories.create') }}" class="btn btn-icon btn-primary btn-sm">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text">Add New @yield('title')</span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-striped table-bordered table-hover datatable" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('categories.index') }}",
                type: 'GET',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'name'},
                {data: 'slug'},
            ],
            columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return '\
                            <a class="btn btn-secondary btn-sm" href="" data-toggle="tooltip" data-placement="top" title="Edit">\
                                <i class="fas fa-pencil-alt"></i>\
                            </a>\
                            <a class="btn btn-secondary btn-sm" href="" data-toggle="tooltip" data-placement="top" title="Delete">\
                                <i class="fas fa-trash"></i>\
                            </a>\
						';
					},
				},
			],
        });
    });
</script>
@endpush
