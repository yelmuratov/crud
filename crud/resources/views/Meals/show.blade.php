@extends('index')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Meal Details</div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $meal->name }}</td>
                    </tr>
                    <tr>
                        <th>Ingredients</th>
                        <td>
                            @foreach($meal->ingredients as $ingredient)
                                {{ $ingredient->name }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $meal->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $meal->updated_at }}</td>
                    </tr>
                </table>
                <a href="{{ route('meals.edit', $meal) }}" class="btn btn-warning mt-3">Edit</a>
                <a href="{{ route('meals.index') }}" class="btn btn-primary mt-3">Back to Meals List</a>
            </div>
        </div>
    </div>
@endsection
