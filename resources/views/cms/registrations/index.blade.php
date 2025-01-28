@extends('cms.layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center" style="color: #0d484e;">Thamaya Registrations</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Product Details</th>
                            <th>Location</th>
                            <th>Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                        <tr>
                            <td>{{ $registration->id }}</td>
                            <td>{{ $registration->name }}</td>
                            <td>{{ $registration->contact_no }}</td>
                            <td>{{ $registration->mail_id }}</td>
                            <td>{{ $registration->company_name }}</td>
                            <td>{{ $registration->product_details }}</td>
                            <td>{{ $registration->city }}, {{ $registration->state }}</td>
                            <td>{{ $registration->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $registrations->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .table th {
        background-color: #0d484e;
        color: white;
    }
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }
</style>
@endsection
