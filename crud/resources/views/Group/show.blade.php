@extends('index')

@section('content')
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">Group Details</div>

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
                <th>Group Name</th>
                <td>{{ $group->name }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $group->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $group->updated_at }}</td>
            </tr>
            </table>
            <a href="{{ route('groups.edit', $group) }}" class="btn btn-warning mt-3">Edit</a>
            <a href="{{ route('groups.index') }}" class="btn btn-primary mt-3">Back to Groups List</a>
        </div>
        </div>
    </div>
@endsection