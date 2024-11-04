@extends('index')

@section('content')
<div class="container">
    <h2>Create Major</h2>
    <form action="{{ route('majors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="university_id">University:</label>
            <select name="university_id" id="university_id" class="form-control" required>
                <option value="">Select University</option>
                @foreach($universities as $university)
                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                @endforeach
            </select>
            @error('university_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="faculty_id">Faculty:</label>
            <select name="faculty_id" id="faculty_id" class="form-control" required>
                <option value="">Select Faculty</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>
            @error('faculty_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Major Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
