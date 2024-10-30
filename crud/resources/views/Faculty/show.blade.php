@extends('index')

@section('content')
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">Product Details</div>

        <div class="card-body">
            <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <th>Count</th>
                <td>{{ $product->count }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $product->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $product->updated_at }}</td>
            </tr>
            </table>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning mt-3">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back to Products List</a>
        </div>
        </div>
    </div>
@endsection