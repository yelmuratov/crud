@extends('index')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">University Details</div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $university->name }}</td>
                    </tr>
                    <tr>
                        <th>Faculties Count</th>
                        <td>{{ $counts['facultiesCount'] }}</td>
                    </tr>
                    <tr>
                        <th>Majors Count</th>
                        <td>{{ $counts['majorsCount'] }}</td>
                    </tr>
                    <tr>
                        <th>Groups Count</th>
                        <td>{{ $counts['groupsCount'] }}</td>
                    </tr>
                    <tr>
                        <th>Students Count</th>
                        <td>{{ $counts['studentsCount'] }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $university->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $university->updated_at }}</td>
                    </tr>
                </table>
                <a href="{{ route('universities.edit', $university) }}" class="btn btn-warning mt-3">Edit</a>
                <a href="{{ route('universities.index') }}" class="btn btn-primary mt-3">Back to Universities List</a>
            </div>
        </div>
    </div>
@endsection
