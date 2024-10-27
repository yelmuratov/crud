@extends('index')

@section('content')
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">Company Details</div>

        <div class="card-body">
            <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $company->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $company->description }}</td>
            </tr>
            <tr>
                <th>Website</th>
                <td>{{ $company->website }}</td>
            </tr>
            <tr>
                <th>Logo</th>
                <td>{{ $company->logo }}</td>
            </tr>
            </table>
            <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning mt-3">Edit</a>
            <a href="{{ route('companies.index') }}" class="btn btn-primary mt-3">Back to Companies List</a>
        </div>
        </div>
    </div>
@endsection