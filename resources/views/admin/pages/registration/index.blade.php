@extends('admin.layouts.main-datatables')
@section('title', 'User Registration')
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
                            <h3>User Registration</h3>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-success btn-sm btn-round btn-icon" href="{{ route('registrations.create') }}">
                               <i class="fa fa-plus"></span></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-striped table-bordered data-custom" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Event Name</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Instansi</th>
                                <th>NIM</th>
                                <th>Kelas</th>
                                <th>Semester</th>
                                <th>Get Info</th>
                                <th>Payment Confirmation</th>
                                <th>Payment Upload</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $key => $registration)
                                <tr>
                                    @if($registration->posts['author_id'] == Auth::id())
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $registration->posts['event_title'] }}</td>
                                        <td>{{ $registration->full_name }}</td>
                                        <td>{{ $registration->email }}</td>
                                        <td>{{ $registration->phone_number }}</td>
                                        <td>{{ $registration->status }}</td>
                                        <td>{{ $registration->instansi }}</td>
                                        <td>{{ $registration->nim }}</td>
                                        <td>{{ $registration->kelas }}</td>
                                        <td>{{ $registration->semester }}</td>
                                        <td>{{ $registration->info }}</td>
                                        <td>
                                            @if($registration->payment_confirmation == 1)
                                                <label class="badge badge-success">Success</label>
                                            @else
                                                <label class="badge badge-danger">Failed</label>
                                            @endif
                                        </td>
                                        <td><img src="{{ URL::to('/') }}/payment_upload/{{ $registration->payment_upload }}" width="50"></td>
                                        <td>{{ $registration->created_at }}</td>
                                        <td>

                                            <a class="btn btn-info btn-sm " href="{{ route('registrations.show', $registration->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary btn-sm " href="{{ route('registrations.edit', $registration->id) }}"><i class="fas fa-user-edit"></i></a>
                                            {!! Form::open(array(
                                                'style' => 'display:inline-block',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('Are you sure?');",
                                                'route' => ['registrations.destroy', $registration->id])) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}

                                        </td>
                                    @elseif(Auth::user()->hasRole('Super Admin'))
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $registration->posts['event_title'] }}</td>
                                        <td>{{ $registration->full_name }}</td>
                                        <td>{{ $registration->email }}</td>
                                        <td>{{ $registration->phone_number }}</td>
                                        <td>{{ $registration->status }}</td>
                                        <td>{{ $registration->instansi }}</td>
                                        <td>{{ $registration->nim }}</td>
                                        <td>{{ $registration->kelas }}</td>
                                        <td>{{ $registration->semester }}</td>
                                        <td>{{ $registration->info }}</td>
                                        <td>
                                            @if($registration->payment_confirmation == 1)
                                                <label class="badge badge-success">Success</label>
                                            @else
                                                <label class="badge badge-danger">Failed</label>
                                            @endif
                                        </td>
                                        <td><img src="{{ URL::to('/') }}/payment_upload/{{ $registration->payment_upload }}" width="50"></td>
                                        <td>{{ $registration->created_at }}</td>
                                        <td>

                                            <a class="btn btn-info btn-sm " href="{{ route('registrations.show', $registration->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary btn-sm " href="{{ route('registrations.edit', $registration->id) }}"><i class="fas fa-user-edit"></i></a>
                                            {!! Form::open(array(
                                                'style' => 'display:inline-block',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('Are you sure?');",
                                                'route' => ['registrations.destroy', $registration->id])) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}

                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom')
    <script type="text/javascript">
        $(function () {
            var table = $('.data-custom').DataTable({
                responsive: true,
                select: true,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
            });
        });
    </script>
@endpush
