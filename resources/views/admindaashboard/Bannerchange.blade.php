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
    change Banner
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
                <form id="serviceForm" enctype="multipart/form-data" action="{{route('banner.post')}}" method="POST">
                    @csrf
                    <div class="notice-box">
                        <h1>⚠ Notice:</h1>
                        <p>Please upload an image with a maximum size of <strong>1MB</strong>.</p>
                    </div>

                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Service Name</label>
                        <textarea class="form-control" name="service_name" id="name" required></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Service Description</label>
                        <textarea class="form-control" name="service_description" id="desc" required></textarea>
                    </div>

                    <div class="notice-box">
                        <h1>Banner image:</h1>
                    </div>


                    <div class="mb-3">
                        <label for="serviceImage" class="form-label">Imag</label>
                        <input type="file" name="image" class="form-control" id="Image" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submitButton">save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{--------------------------------------------------------------------------------------------------- --}}

<div class="container mt-4">
    <h1 class="text-center mb-4">😀 View carousel</h1>

    <div  class=" table-responsive shadow-lg p-3 bg-white rounded">
        <table  class="table table-bordered table-hover" id="courierTable">
            <thead style="background: black" class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Banner Image</th>
                    <th>Banner Name</th>
                    <th>Banner Description</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($banner as $b )
                <th>{{$b->id}}</th>
                <th> <img src="{{ asset($b->image) }}" alt="Product Image" width="100" ></th>
                <th>{{$b->service_name}}</th>
                <th>{{$b->service_description}}</th>

                <td>
                    <form class="delete-form" action="{{ route('banner.delete', $b->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
                          </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>




@endsection