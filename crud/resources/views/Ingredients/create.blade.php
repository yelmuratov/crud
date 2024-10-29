@extends('index')

@section('content')
<div class="pe-3">
    <h1>Create Ingredient</h1>
    <form action="{{ route('ingredients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Ingredient Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Add Ingredient</button>
        <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
