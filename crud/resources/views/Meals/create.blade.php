@extends('index')

@section('content')
<div class="pe-3">
    <h1>Create Meal</h1>
    <form action="{{ route('meals.store') }}" method="POST">
        @csrf
        <!-- Meal Name -->
        <div class="form-group">
            <label for="name">Meal Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Ingredients Selection -->
        <div class="form-group">
            <label for="ingredients">Ingredients:</label>
            <select class="form-control" id="ingredients" name="ingredient_ids[]" multiple required>
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}" {{ in_array($ingredient->id, old('ingredient_ids', [])) ? 'selected' : '' }}>
                        {{ $ingredient->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('ingredient_ids')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Add Meal</button>
    </form>
</div>
@endsection
