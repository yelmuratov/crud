@extends('index')

@section('content')
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">Major Details</div>
        <div class="card-body">
            <table class="table table-bordered">
            <tr>
                <th>University Name</th>
                <td>{{ $university->name }}</td>
            </tr>
            <tr>
                <th>Faculty Name</th>
                <td>{{ $faculty->name }}</td>
            </tr>
            <tr>
                <th>Major Name</th>
                <td>{{ $major->name }}</td>
            </tr>
            <tr>
                <th>Groups Count</th>
                <td>{{ $counts['groupCount'] }}</td>
            </tr>
            <tr>
                <th>Student Count</th>
                <td>{{ $counts['studentCount'] }}</td>
            </tr>
            </table>
            <a href="{{ route('majors.edit', $major) }}" class="btn btn-warning mt-3">Edit</a>
            <a href="{{ route('majors.index') }}" class="btn btn-primary mt-3">Back to Majors List</a>
        </div>
        </div>
    </div>
@endsection