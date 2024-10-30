@extends('index')

@section('content')
<div class="container">
    <h2>Edit Company</h2>
    <form action="{{ route('companies.update',$company)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">Company Owner:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select Owner</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $company->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="name">Company Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $company->description }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="url" class="form-control" id="website" name="website" value="{{ $company->website }}" required>
            @error('website')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection