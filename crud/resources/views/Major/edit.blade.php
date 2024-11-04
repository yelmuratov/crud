@extends('index')

@section('content')
<div class="container">
    <h2>Edit Major</h2>
    <form action="{{ route('majors.update', $major) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="university_id">University:</label>
            <select name="university_id" id="university_id" class="form-control" required>
                <option value="">Select University</option>
                @foreach($universities as $university)
                    <option value="{{ $university->id }}" {{ $CurrentUniversity->id == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
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
                    <option value="{{ $faculty->id }}" {{ $major->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}</option>
                @endforeach
            </select>
            @error('faculty_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Major Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $major->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
@section('content')
<div class="container">
    <h2>Edit Major</h2>
    <form action="{{ route('majors.update', $major) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="university_id">University:</label>
            <select name="university_id" id="university_id" class="form-control" required>
                <option value="">Select University</option>
                @foreach($universities as $university)
                    <option value="{{ $university->id }}" {{ $major->university_id == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
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
                    <option value="{{ $faculty->id }}" {{ $major->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}</option>
                @endforeach
            </select>
            @error('faculty_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Major Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $major->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection