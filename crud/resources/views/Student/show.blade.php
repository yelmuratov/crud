@extends('index')

@section('content')
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">Student Details</div>

        <div class="card-body">
            <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Group</th>
                <td>{{ $group->name }}</td>
            </tr>
            <tr>
                <th>Major</th>
                <td>{{ $major->name }}</td>
            </tr>
            <tr>
                <th>Faculty</th>
                <td>{{ $faculty->name }}</td>
            </tr>
            <tr>
                <th>University</th>
                <td>{{ $university->name }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $student->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $student->updated_at }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $student->phone }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td><img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}" width="100"></td>
            </tr>
            </table>
            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning mt-3">Edit</a>
            <a href="{{ route('students.index') }}" class="btn btn-primary mt-3">Back to Students List</a>
        </div>
        </div>
    </div>
@endsection