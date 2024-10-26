@extends('index')

@section('content')
<div class="pe-3">
    <h1>Create Company</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Company Owner:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select Owner</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Company Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Company Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="website">Company Website:</label>
            <input type="text" class="form-control" id="website" name="website" required>
        </div>
        <div class="form-group">
            <label for="logo">Company Logo:</label>
            <input type="file" class="form-control" id="logo" name="logo" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection