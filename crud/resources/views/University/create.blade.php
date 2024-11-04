@extends('index')

@section('content')
<div class="pe-3">
    <h1>Create University</h1>
    <form action="{{ route('universities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">University Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
