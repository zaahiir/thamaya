{{-- views/cms/registrations/index.blade.php --}}
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
                            <th>Action</th>
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
                            <td>
                                <button type="button" class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#viewModal{{ $registration->id }}">
                                    View More
                                </button>
                            </td>
                        </tr>

                        <!-- Modal for each registration -->
                        <div class="modal fade" id="viewModal{{ $registration->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Registration Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Name:</strong> {{ $registration->name }}</p>
                                                <p><strong>Father/Spouse Name:</strong> {{ $registration->father_spouse_name }}</p>
                                                <p><strong>Address:</strong> {{ $registration->address }}</p>
                                                <p><strong>Locality/Area:</strong> {{ $registration->locality_area }}</p>
                                                <p><strong>City:</strong> {{ $registration->city }}</p>
                                                <p><strong>District:</strong> {{ $registration->district }}</p>
                                                <p><strong>State:</strong> {{ $registration->state }}</p>
                                                <p><strong>Contact:</strong> {{ $registration->contact_no }}</p>
                                                <p><strong>Alternative Contact:</strong> {{ $registration->alternative_no }}</p>
                                                <p><strong>Email:</strong> {{ $registration->mail_id }}</p>
                                                <p><strong>Age:</strong> {{ $registration->age }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Date of Birth:</strong> {{ $registration->date_of_birth }}</p>
                                                <p><strong>Marital Status:</strong> {{ $registration->marital_status }}</p>
                                                <p><strong>Family Members:</strong> {{ $registration->family_members }}</p>
                                                <p><strong>Company Name:</strong> {{ $registration->company_name }}</p>
                                                <p><strong>Company Address:</strong> {{ $registration->company_address }}</p>
                                                <p><strong>Product Details:</strong> {{ $registration->product_details }}</p>
                                                <p><strong>Product Category:</strong> {{ $registration->product_category }}</p>
                                                <p><strong>Target Audience:</strong> {{ $registration->target_audience }}</p>
                                                <p><strong>Social Media Links:</strong> {{ $registration->social_media_links }}</p>
                                                <p><strong>Product Cost:</strong> {{ $registration->product_cost }}</p>
                                                <p><strong>Services Needed:</strong> {{ $registration->services_needed }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    .modal-body p {
        margin-bottom: 0.5rem;
    }
    .btn-primary {
        background-color: #0d484e;
        border-color: #0d484e;
    }
    .btn-primary:hover {
        background-color: #0a3539;
        border-color: #0a3539;
    }
</style>
@endsection
