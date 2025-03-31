@extends('admindaashboard.main')
@section('admin-main')

<div class="container mt-4">
    <h1 class="text-center mb-4">👤 View All Users</h1>

    <div class="table-responsive shadow-lg p-3 bg-white rounded">
        <table class="table table-bordered table-hover" id="userTable">
            <thead style="background: black" class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->role}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{$c->email}}</td>
                    <td>{{$c->password}}</td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewUserModal{{ $c->id }}">
                            <i class="fas fa-eye"></i> View Details
                        </button>
                        <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>

                <!-- View User Details Modal -->
                <div class="modal fade" id="viewUserModal{{ $c->id }}" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h5 class="modal-title" id="viewUserModalLabel">User Details (ID: {{ $c->id }})</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>ID:</strong> {{ $c->id }}</p>
                                <p><strong>Role:</strong> {{ $c->role }}</p>
                                <p><strong>Name:</strong> {{ $c->name }}</p>
                                <p><strong>Email:</strong> {{ $c->email }}</p>
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
