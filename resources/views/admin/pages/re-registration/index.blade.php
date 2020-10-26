@extends('admin.layouts.main-datatables')
@section('title', 'Re Registration')
@section('body')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>{{ $message }}, Wait for confirmation!</strong> </span>
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
                            <h3>Re Registrations</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table align-items-center table-flush" >
                        <thead class="thead-light">
                            <tr>
                                <th>Full Name</th>
                                <th>Status</th>
                                <th>Event Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $key => $registration)
                                <tr>
                                    <td>{{ $registration->full_name }}</td>
                                    <td>{{ $registration->status }}</td>
                                    <td>{{ $registration->posts['event_title'] }}</td>
                                    <td>
                                        @if ($registration->posts['payment_status'] == true)
                                            <a class="btn btn-info btn-sm " href="{{ route('payment-upload', $registration->id) }}" title="Payment Upload"><i class="fa fa-upload"></i></a>
                                        @endif
                                        @if($registration->payment_confirmation == true || $registration->posts['payment_status'] == false)
                                            <a class="btn btn-primary btn-sm " href="{{ $registration->posts['path_to'] }}"><i class="ni ni-check-bold"></i></a>
                                        @endif
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
