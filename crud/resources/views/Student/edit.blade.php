@extends('index')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Edit Student</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="group">Group:</label>
                    <select class="form-control" id="group" name="group_id" required>
                        <option value="">Select Group</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}" {{ $student->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                    @error('group_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" required>
                    @error('phone')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                @error('any')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection