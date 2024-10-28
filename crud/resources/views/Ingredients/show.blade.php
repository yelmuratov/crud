@extends('index')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Ingredient Details</div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $ingredient->name }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $ingredient->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $ingredient->updated_at }}</td>
                    </tr>
                </table>
                <a href="{{ route('ingredients.edit', $ingredient) }}" class="btn btn-warning mt-3">Edit</a>
                <a href="{{ route('ingredients.index') }}" class="btn btn-primary mt-3">Back to Ingredients List</a>
            </div>
        </div>
    </div>
@endsection
