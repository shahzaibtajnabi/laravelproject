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
    <h1 class="text-center mb-4">👨‍🎨 View All Product booking</h1>

    <div  class=" table-responsive shadow-lg p-3 bg-white rounded">
        <table  class="table table-bordered table-hover" id="courierTable">
            <thead style="background: black" class="thead-dark">
                <tr>
                    <th>Product_Id</th>
                    <th>Product_Image</th>
                    <th>Tracking No:</th>
                    <th>Customer_name</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>View Details</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booking as $b )
                <th>{{$b->product_id}}</th>
                <td>
                    <img src="{{ asset($b->product->image) }}" width="85" alt="Product Image">
                </td>

                <th>{{$b->tracking_number}}</th>
                <th>{{$b->customer_name}}</th>
                <td>
                    <span class="badge
                        {{ $b->Ostatus == 'pending' ? 'badge-warning' :
                           ($b->Ostatus == 'approve' ? 'badge-success' :
                           ($b->Ostatus == 'reject' ? 'badge-danger' : '')) }}">
                        {{ ucfirst($b->Ostatus) }}
                    </span>
                </td>

                    <td>
                        <!-- Update Button with Modal Trigger -->
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateModal{{ $b->id }}">
                            <i class="fas fa-edit"></i> Update
                        </button>
                    </td>

                    <!-- View Details Button -->
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewDetailsModal{{ $b->id }}">
                            <i class="fas fa-eye"></i> View Details
                        </button>
                    </td>

                    <td>
                        <form class="delete-form" action="{{route('booking.delete',$b->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Update Modal -->
                 <div class="modal fade" id="updateModal{{ $b->id }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('booking-update.post', $b->id) }}" method="POST">
                                @csrf
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="updateModalLabel">Update Booking Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="Ostatus" required>
                                            <option value="pending" {{ $b->Ostatus == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approve" {{ $b->Ostatus == 'approve' ? 'selected' : '' }}>Approve</option>
                                            <option value="reject" {{ $b->Ostatus == 'reject' ? 'selected' : '' }}>Reject</option>
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
                <div class="modal fade" id="viewDetailsModal{{ $b->id }}" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h5 class="modal-title" id="viewDetailsModalLabel">Booking Details (ID: {{ $b->id }})</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <h6 class="text-muted">Booking Information</h6>
                                <p><strong>Order ID:</strong> {{ $b->id }}</p>
                                <p><strong>customer_name:</strong> {{ $b->customer_name }}</p>
                                <p><strong>address:</strong> {{ $b->address }}</p>
                                <p><strong>city:</strong> {{ $b->city }}</p>
                                <p><strong>phone:</strong> {{ $b->phone }}</p>
                                <p><strong>email:</strong> {{ $b->email }}</p>
                                <p><strong>order_notes:</strong> {{ $b->order_notes }}</p>
                                <p><strong>product_id:</strong> {{ $b->product_id }}</p>
                                <p><strong>product_name:</strong> {{ $b->product_name }}</p>
                                <p><strong>product_desc:</strong> {{ $b->product_desc }}</p>
                                <p><strong>product_price:</strong> {{ $b->product_price }}</p>
                                <p><strong>quantity:</strong> {{ $b->quantity }}</p>
                                <p><strong>total_price:</strong> {{ $b->total_price }}</p>
                                <p><strong>payment_method:</strong> {{ $b->payment_method }}</p>





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