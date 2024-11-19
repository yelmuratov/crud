@extends('index')

@section('content')
<div class="container">
    <h2>Edit Meal</h2>
    <form action="{{ route('meals.update', $meal) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Meal Name -->
        <div class="form-group">
            <label for="name">Meal Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $meal->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ingredients Selection with Bootstrap Select -->
        <div class="form-group">
            <label for="ingredients">Ingredients:</label>
            <select class="form-control selectpicker" id="ingredients" name="ingredient_ids[]" multiple data-live-search="true" data-style="btn-primary" title="Select ingredients" required>
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}" 
                        {{ $meal->ingredients->contains($ingredient->id) ? 'selected' : '' }}>
                        {{ $ingredient->name }}
                    </option>
                @endforeach
            </select>
            @error('ingredient_ids')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Meal</button>
    </form>
</div>
@endsection

@section('scripts')
<!-- Initialize Bootstrap Select -->
<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
</script>
@endsection
