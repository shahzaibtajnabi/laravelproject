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


<div class="container mt-4">
    <h1 class="text-center mb-4">😡 View All Rejected Appoinment</h1>

    <div  class=" table-responsive shadow-lg p-3 bg-white rounded">
        <table  class="table table-bordered table-hover" id="courierTable">
            <thead style="background: black" class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>View Details</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reject as $Appoin )
                <th>{{$Appoin->id}}</th>
                <th>{{$Appoin->name}}</th>
                <th>{{$Appoin->email}}</th>
                <td>
                    <span class="badge
                        {{ $Appoin->status == 'pending' ? 'badge-warning' :
                           ($Appoin->status == 'approve' ? 'badge-success' :
                           ($Appoin->status == 'reject' ? 'badge-danger' : '')) }}">
                        {{ ucfirst($Appoin->status) }}
                    </span>
                </td>

                    <td>
                        <!-- Update Button with Modal Trigger -->
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateModal{{ $Appoin->id }}">
                            <i class="fas fa-edit"></i> Update
                        </button>
                    </td>

                    <!-- View Details Button -->
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewDetailsModal{{ $Appoin->id }}">
                            <i class="fas fa-eye"></i> View Details
                        </button>
                    </td>

                    <td>
                        <form class="delete-form" action="{{ route('delete', $Appoin->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Update Modal -->
                <div class="modal fade" id="updateModal{{ $Appoin->id }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('appoinment-update.post', $Appoin->id) }}" method="POST">
                                @csrf
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="updateModalLabel">Update Courier Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="pending" {{ $Appoin->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approve" {{ $Appoin->status == 'approve' ? 'selected' : '' }}>Approve</option>
                                            <option value="reject" {{ $Appoin->status == 'reject' ? 'selected' : '' }}>Reject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- View Details Modal -->
                <div class="modal fade" id="viewDetailsModal{{ $Appoin->id }}" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h5 class="modal-title" id="viewDetailsModalLabel">Appoinment Details (ID: {{ $Appoin->id }})</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">




                                <!-- Sender Details -->
                                <h6 class="text-muted">Appoinment Information</h6>
                                <p><strong>Name:</strong> {{ $Appoin->name }}</p>
                                <p><strong>Phone:</strong> {{ $Appoin->email }}</p>
                                <p><strong>Email:</strong> {{ $Appoin->date }}</p>
                                <p><strong>Date:</strong> {{ $Appoin->time }}</p>
                                <p><strong>Service:</strong> {{ $Appoin->Service }}</p>
                                <p><strong>Status:</strong> {{ $Appoin->status }}</p>



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