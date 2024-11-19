@extends('index')

@section('content')
<div class="container">
    <h2>Edit Ingredient</h2>
    <form action="{{ route('ingredients.update', $ingredient) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Ingredient Name -->
        <div class="form-group">
            <label for="name">Ingredient Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $ingredient->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Ingredient</button>
    </form>
</div>
@endsection
