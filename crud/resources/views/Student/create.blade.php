@extends('index')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Create Student</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="group">Group:</label>
                    <select class="form-control" id="group" name="group_id" required>
                        <option value="">Select Group</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}" {{ old('group') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                    @error('group_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                @error('any')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection