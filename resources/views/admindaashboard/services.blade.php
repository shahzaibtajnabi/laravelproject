@extends('admindaashboard.main')
@section('admin-main')

@if (session('alert'))
<div class="success-alert" id="successAlert">
    <div class="pink-panther-cartoon">
        <img src="{{ asset('assets/img/pinkpenther.png') }}" alt="Pink Panther">
    </div>
    <span>{{ session('alert')['message'] }}</span>
</div>

@endif


<!-- Button to Open Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#serviceModal">
    Create Service/Price
</button>

<!-- Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Create Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="serviceForm" enctype="multipart/form-data" action="{{ route('global-post') }}" method="post">
                    @csrf
                    <div class="notice-box">
                        <h1>⚠ Notice:</h1>
                        <p>Please upload an image with a maximum size of <strong>1MB</strong>.</p>
                    </div>

                    <div class="mb-3">
                        <label for="serviceName" class="form-label">Service Name</label>
                        <input type="text" name="name" class="form-control" id="serviceName" required>
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="Desc" id="serviceDescription" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="serviceImage" class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" id="serviceImage" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="servicePrice" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="servicePrice" placeholder="$" required >
                    </div>

                    <!-- 5 Heading Inputs -->
                    <div class="mb-3">
                        <label for="heading1" class="form-label">Heading 1</label>
                        <input type="text" name="heading1" class="form-control" id="heading1" required>
                    </div>
                    <div class="mb-3">
                        <label for="heading2" class="form-label">Heading 2</label>
                        <input type="text" name="heading2" class="form-control" id="heading2" required>
                    </div>
                    <div class="mb-3">
                        <label for="heading3" class="form-label">Heading 3</label>
                        <input type="text" name="heading3" class="form-control" id="heading3" required>
                    </div>
                    <div class="mb-3">
                        <label for="heading4" class="form-label">Heading 4</label>
                        <input type="text" name="heading4" class="form-control" id="heading4" required>
                    </div>
                    <div class="mb-3">
                        <label for="heading5" class="form-label">Heading 5</label>
                        <input type="text" name="heading5" class="form-control" id="heading5" required>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submitButton">Save Service</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{----------------------------------------------------------------------------------- --}}

  <div class="container mt-4">
    <h1 class="text-center mb-4">😀 View All Services</h1>

    <div  class=" table-responsive shadow-lg p-3 bg-white rounded">
        <table  class="table table-bordered table-hover" id="courierTable">
            <thead style="background: black" class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Details</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($global as $g )
                <th>{{$g->id}}</th>
                <th>{{$g->name}}</th>
                <th>{{$g->Desc}}</th>
                <th class="badge " badge-danger>{{$g->price}}$</th>

                <th>
                    <img src="{{ asset($g->image) }}" alt="Service Image" width="100" >
                </th>



                    <!-- View Details Button -->
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewDetailsModal{{ $g->id }}">
                            <i class="fas fa-eye"></i> View Details
                        </button>
                    </td>

                    <td>
                        <form class="delete-form" action="{{ route('services-delete', $g->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>



                <!-- View Details Modal -->
                <div class="modal fade" id="viewDetailsModal{{ $g->id }}" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h5 class="modal-title" id="viewDetailsModalLabel">Appoinment Details (ID: {{ $g->id }})</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">




                                <!-- Sender Details -->
                                <h6 class="text-muted">Appoinment Information</h6>
                                <p><strong>Name:</strong> {{ $g->name }}</p>
                                <p><strong>Desc:</strong> {{ $g->Desc }}</p>
                                <p><strong>Image:</strong> {{ $g->image }}</p>
                                <p><strong>Price:</strong> {{ $g->price }}$</p>
                                <p><strong>Heading1:</strong> {{ $g->heading1 }}</p>
                                <p><strong>Heading2:</strong> {{ $g->heading2 }}</p>
                                <p><strong>Heading3:</strong> {{ $g->heading3}}</p>
                                <p><strong>Heading4:</strong> {{ $g->heading4 }}</p>
                                <p><strong>Heading5:</strong> {{ $g->heading5 }}</p>


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
</div>



@endsection