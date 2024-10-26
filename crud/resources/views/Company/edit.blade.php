@extends('index')

@section('content')
<div class="container">
    <h2>Edit Company</h2>
    <form action="{{ route('companies.update', $company) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Company Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Company Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $company->address }}" required>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection