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
                        <th>Meals</th>
                        <td>
                            @foreach ($ingredient->meals as $meal)
                                {{ $meal->name }}
                            @endforeach
                        </td>
                    </tr>
                </table>
                <a href="{{ route('ingredients.edit', $ingredient) }}" class="btn btn-warning mt-3">Edit</a>
                <a href="{{ route('ingredients.index') }}" class="btn btn-primary mt-3">Back to Ingredients List</a>
            </div>
        </div>
    </div>
@endsection
