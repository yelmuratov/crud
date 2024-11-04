@extends('index')

@section('content')
<div class="container">
    <h2>Edit Group</h2>
    <form action="{{ route('groups.update', $group) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="university_id">University:</label>
            <select name="university_id" id="university_id" class="form-control" required>
                <option value="">Select University</option>
                @foreach($universities as $university)
                    <option value="{{ $university->id }}" {{ $currentUniversity && $currentUniversity->id == $university->id ? 'selected' : '' }}>
                        {{ $university->name }}
                    </option>
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
                    <option value="{{ $faculty->id }}" {{ $currentFaculty && $currentFaculty->id == $faculty->id ? 'selected' : '' }}>
                        {{ $faculty->name }}
                    </option>
                @endforeach
            </select>
            @error('faculty_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="major_id">Major:</label>
            <select name="major_id" id="major_id" class="form-control" required>
                <option value="">Select Major</option>
                @foreach($majors as $major)
                    <option value="{{ $major->id }}" {{ $currentMajor && $currentMajor->id == $major->id ? 'selected' : '' }}>
                        {{ $major->name }}
                    </option>
                @endforeach
            </select>
            @error('major_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Group Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $group->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Group</button>
    </form>
</div>
@endsection
