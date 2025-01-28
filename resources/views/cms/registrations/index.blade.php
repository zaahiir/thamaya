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
                <table id="registrationsTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Product Details</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for registration details -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registration Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <span id="modal-name"></span></p>
                        <p><strong>Father/Spouse Name:</strong> <span id="modal-father-spouse"></span></p>
                        <p><strong>Address:</strong> <span id="modal-address"></span></p>
                        <p><strong>Locality/Area:</strong> <span id="modal-locality"></span></p>
                        <p><strong>City:</strong> <span id="modal-city"></span></p>
                        <p><strong>District:</strong> <span id="modal-district"></span></p>
                        <p><strong>State:</strong> <span id="modal-state"></span></p>
                        <p><strong>Contact:</strong> <span id="modal-contact"></span></p>
                        <p><strong>Alternative Contact:</strong> <span id="modal-alt-contact"></span></p>
                        <p><strong>Email:</strong> <span id="modal-email"></span></p>
                        <p><strong>Age:</strong> <span id="modal-age"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Date of Birth:</strong> <span id="modal-dob"></span></p>
                        <p><strong>Marital Status:</strong> <span id="modal-marital"></span></p>
                        <p><strong>Family Members:</strong> <span id="modal-family"></span></p>
                        <p><strong>Company Name:</strong> <span id="modal-company"></span></p>
                        <p><strong>Company Address:</strong> <span id="modal-company-address"></span></p>
                        <p><strong>Product Details:</strong> <span id="modal-product"></span></p>
                        <p><strong>Product Category:</strong> <span id="modal-category"></span></p>
                        <p><strong>Target Audience:</strong> <span id="modal-audience"></span></p>
                        <p><strong>Social Media Links:</strong> <span id="modal-social"></span></p>
                        <p><strong>Product Cost:</strong> <span id="modal-cost"></span></p>
                        <p><strong>Services Needed:</strong> <span id="modal-services"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .table th {
        background-color: #0d484e;
        color: white;
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
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#registrationsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('registrations.data') }}",
            type: 'GET',
            error: function(xhr, error, thrown) {
                console.log('DataTables error:', error);
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'contact_no', name: 'contact_no'},
            {data: 'mail_id', name: 'mail_id'},
            {data: 'company_name', name: 'company_name'},
            {data: 'product_details', name: 'product_details'},
            {
                data: null,
                name: 'location',
                render: function(data) {
                    return data.city + ', ' + data.state;
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ],
        order: [[1, 'asc']], // Order by name column
        pageLength: 10,
        language: {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
            zeroRecords: 'No matching records found',
            lengthMenu: 'Show _MENU_ entries',
            info: 'Showing _START_ to _END_ of _TOTAL_ entries',
            infoEmpty: 'Showing 0 to 0 of 0 entries',
            infoFiltered: '(filtered from _MAX_ total entries)'
        }
    });

    // View Details Modal Handler
    $('#registrationsTable').on('click', '.view-details', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/registrations/${id}`,
            method: 'GET',
            success: function(response) {
                // Populate modal with registration details
                $('#modal-name').text(response.name || '-');
                $('#modal-father-spouse').text(response.father_spouse_name || '-');
                $('#modal-address').text(response.address || '-');
                $('#modal-locality').text(response.locality_area || '-');
                $('#modal-city').text(response.city || '-');
                $('#modal-district').text(response.district || '-');
                $('#modal-state').text(response.state || '-');
                $('#modal-contact').text(response.contact_no || '-');
                $('#modal-alt-contact').text(response.alternative_no || '-');
                $('#modal-email').text(response.mail_id || '-');
                $('#modal-age').text(response.age || '-');
                $('#modal-dob').text(response.date_of_birth || '-');
                $('#modal-marital').text(response.marital_status || '-');
                $('#modal-family').text(response.family_members || '-');
                $('#modal-company').text(response.company_name || '-');
                $('#modal-company-address').text(response.company_address || '-');
                $('#modal-product').text(response.product_details || '-');
                $('#modal-category').text(response.product_category || '-');
                $('#modal-audience').text(response.target_audience || '-');
                $('#modal-social').text(response.social_media_links || '-');
                $('#modal-cost').text(response.product_cost || '-');
                $('#modal-services').text(response.services_needed || '-');

                $('#viewModal').modal('show');
            },
            error: function(xhr) {
                alert('Error fetching registration details');
                console.log(xhr);
            }
        });
    });
});
</script>
@endpush
@endsection
