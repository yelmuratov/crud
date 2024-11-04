@extends('index')

@section('content')
<div class="container">
    <h2>Edit Faculty</h2>
    <form action="{{ route('faculties.update', $faculty) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- university name --}}
        <div class="form-group">
            <label for="university">University:</label>
            <select class="form-control" id="university" name="university_id" required>
                <option value="">Select University</option>
                @foreach ($universities as $university)
                    <option value="{{ $university->id }}" {{ $faculty->university_id == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
                @endforeach
            </select>
            @error('university_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="name">Faculty Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $faculty->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('faculties.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
