@extends('index')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Faculty Details</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $faculty->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $faculty->name }}</td>
                    </tr>
                    <tr>
                        <th>University</th>
                        <td>{{$university->name}}</td>
                    </tr>
                    <tr>
                        <th>Majors</th>
                        <td>{{ $counts['majorsCount'] }}</td>
                    </tr>
                    <tr>
                        <th>Groups</th>
                        <td>{{ $counts['groupsCount'] }}</td>
                    </tr>
                    <tr>
                        <th>Students</th>
                        <td>{{ $counts['studentsCount'] }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $faculty->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $faculty->updated_at }}</td>
                    </tr>
                </table>
                <a href="{{ route('faculties.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection