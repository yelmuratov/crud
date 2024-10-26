@extends('index')

@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Details</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $user->updated_at }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning mt-3">Edit</a>
                    <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Back to Users List</a>
                </div>
            </div>
        </div>
@endsection