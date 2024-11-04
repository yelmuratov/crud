@extends('index')

@section('content')
<div class="container">
    <h2>Edit University</h2>
    <form action="{{ route('universities.update', $university) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">University Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $university->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
