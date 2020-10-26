@extends('admin.layouts.main-datatables')
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
                            <h3>Tags</h3>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-success btn-sm btn-round btn-icon" href="javascript:void(0)" id="create">
                                <span><i class="fas fa-plus"></i></span><span class="btn-inner--text">Create New Tag</span></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-striped table-bordered data-table" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="ModalForm" name="ModalForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-primary" id="saveBtn" value="create">Save changes</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('datatables')
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: false,
                serverSide: true,
                ajax: "{{ route('tags.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', paging: true, searching: true},
                ]
            });

            $('#create').click(function() {
                $('#saveBtn').val('Save');
                $('#id').val('');
                $('#ModalForm').trigger('reset');
                $('#modalHeading').html('Create New Tag');
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.edit', function() {
                var id = $(this).data('id');
                $.get("{{ route('tags.index') }}" +'/'+ id +'/edit', function(data) {
                    $('#modalHeading').html('Edit Tag');
                    $('#saveBtn').val('Update');
                    $('#ajaxModel').modal('show');
                    $('#id').val(data.id);
                    $('#title').val(data.title);
                })
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#ModalForm').serialize(),
                    url: "{{ route('tags.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#ModalForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.delete', function() {
                var id = $(this).data('id');
                confirm('Are You sure want to delete!');

                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('tags.store') }}"+'/'+id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error', data);
                    }
                });
            });
        });
    </script>
@endpush
