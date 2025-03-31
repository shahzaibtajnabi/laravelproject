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
    Create Products
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
                <form id="serviceForm" enctype="multipart/form-data" action="{{route('product-post')}} " method="POST">
                    @csrf
                    <div class="notice-box">
                        <h1>⚠ Notice:</h1>
                        <p>Please upload an image with a maximum size of <strong>1MB</strong>.</p>
                    </div>

                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Product Name</label>
                        <textarea class="form-control" name="name" id="desc" required></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Product Description</label>
                        <textarea class="form-control" name="desc" id="desc" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="serviceImage" class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control" id="Image" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="servicePrice" class="form-label">Product Price</label>
                        <input type="number" name="price" class="form-control" id="Price" placeholder="$" required >
                    </div>
                        
                    <!-- 5 Heading Inputs -->
                    <div class="mb-3">
                        <label for="heading1" class="form-label">Product Color</label>
                        <input type="text" name="color" class="form-control" id="color" required>
                    </div>
                    <div class="mb-3">
                        <label for="heading2" class="form-label">Product Size</label>
                        <input type="text" name="size" class="form-control" id="size" required>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submitButton">Save Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ------------------------------------------------------------------------------------------------- --}}

<div class="container mt-4">
    <h1 class="text-center mb-4">😀 View All Products</h1>

    <div  class=" table-responsive shadow-lg p-3 bg-white rounded">
        <table  class="table table-bordered table-hover" id="courierTable">
            <thead style="background: black" class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Produt Image</th>
                    <th>Products Description</th>
                    <th>Product Price</th>
                    <th>Details</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p )
                <th>{{$p->id}}</th>
                <th> <img src="{{ asset($p->image) }}" alt="Product Image" width="100" ></th>
                <th>{{$p->desc}}</th>
                <th class="badge " badge-danger>{{$p->price}}$</th>

                    <!-- View Details Button -->
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewDetailsModal{{ $p->id }}">
                            <i class="fas fa-eye"></i> View Details
                        </button>
                    </td>

                    <td>
                        <form class="delete-form" action="{{route('product-delete',$p->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>



                <!-- View Details Modal -->
                <div class="modal fade" id="viewDetailsModal{{ $p->id }}" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h5 class="modal-title" id="viewDetailsModalLabel">Products Details (ID: {{ $p->id }})</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6 class="text-muted">Products Information</h6>
                                <p><strong>Description:</strong> {{ $p->desc }}</p>
                                <p><strong>Price:</strong> {{ $p->price }}$</p>
                                <p><strong>Color:</strong> {{ $p->color }}</p>
                                <p><strong>Size:</strong> {{ $p->size }}</p>

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