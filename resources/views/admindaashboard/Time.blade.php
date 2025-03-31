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


</style>

<!-- Button to Open Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#serviceModal">
    Create Time/Date
</button>

<!-- Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Create Center Time/Date</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="serviceForm" enctype="multipart/form-data" action="{{route('set-time')}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="serviceName" class="form-label">Content Name</label>
                        <input type="text" name="name" class="form-control" id="serviceName" required>
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="Desc" id="serviceDescription" required></textarea>
                    </div>
                    <h3>Days/Time</h3>
                    <div class="mb-3">
                        <input type="text" name="day1" class="form-control" id="servicePrice" placeholder="Monday-Friday" required >
                        <div class="time" id="time" data-target-input="nearest"\>
                            <input type="text" name="time1" class="form-control bg-transparent p-4 datetimepicker-input" placeholder="Select Time" data-target="#time" data-toggle="datetimepicker"/>
                        </div>

                    </div>

                    <div class="mb-3">
                        <input type="text" name="day2" class="form-control" id="servicePrice" placeholder="Saturday " required >
                        <div class="time" id="time" data-target-input="nearest">
                            <input type="text" name="time2" class="form-control bg-transparent p-4 datetimepicker-input" placeholder="Select Time" data-target="#time" data-toggle="datetimepicker"/>
                        </div>

                    </div>


                    <div class="mb-3">
                        <input type="text" name="day3" class="form-control" id="servicePrice" placeholder="Sunday" required >
                        <div class="time" id="time" data-target-input="nearest">
                            <input type="text" name="time3" class="form-control bg-transparent p-4 datetimepicker-input" placeholder="Select Time" data-target="#time" data-toggle="datetimepicker"/>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary" id="submitButton">Save Service</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- ------------------------------------------------------------------------------------ --}}

<div class="container mt-4">
    <h1 class="text-center mb-4">😀 View All Time/Days</h1>

    <div  class=" table-responsive shadow-lg p-3 bg-white rounded">
        <table  class="table table-bordered table-hover" id="courierTable">
            <thead style="background: black" class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Description</th>
                    <th>Day/Time</th>
                    <th>Day/Time</th>
                    <th>Day/Time</th>
                    <th>Details</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($global as $g )
                <th>{{$g->id}}</th>
                <th>{{$g->name}}</th>
                <th>{{$g->Desc}}</th>
                 <th>{{$g->day1}}:{{$g->time1}}</th>
                 <th>{{$g->day2}}:{{$g->time2}}</th>
                 <th>{{$g->day3}}:{{$g->time3}}</th>

                    <!-- View Details Button -->
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewDetailsModal{{ $g->id }}">
                            <i class="fas fa-eye"></i> View Details
                        </button>
                    </td>

                    <td>
                        <form class="delete-form" action="{{route('time-delete',$g->id)}}" method="post">
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
                                <h5 class="modal-title" id="viewDetailsModalLabel">Days/Timing Details (ID: {{ $g->id }})</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">




                                <!-- Sender Details -->
                                <h6 class="text-muted">Days/Timing Information</h6>
                                <p><strong>Name:</strong> {{ $g->name }}</p>
                                <p><strong>Desc:</strong> {{ $g->Desc }}</p>
                                <p><strong>Section A:</strong> {{ $g->day1}}:{{$g->time1}}</p>
                                <p><strong>Section B:</strong> {{ $g->day2}}:{{$g->time2}}</p>
                                <p><strong>Section C:</strong> {{ $g->day3}}:{{$g->time3}}</p>

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