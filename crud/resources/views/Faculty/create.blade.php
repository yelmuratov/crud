@extends('index')

@section('content')
<div class="pe-3">
    <h1>Create Faculty</h1>
    <form action="{{ route('faculties.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Faculty Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="university">University:</label>
            <select class="form-control" id="university" name="university_id" required>
                <option value="">Select University</option>
                @foreach ($universities as $university)
                    <option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
                @endforeach
            </select>
        </div>
        @error('university_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
