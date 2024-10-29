@extends('index')

@section('title', 'Ingredients')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ingredients</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ingredients</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ingredients Table with minimal features & hover style</h3>
              <a href="{{ route('ingredients.create') }}" class="btn btn-primary float-right">Add Ingredient</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
                </div>
              </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Meals</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ingredients as $ingredient)
                    <tr>
                      <td>{{ $ingredient->id }}</td>
                      <td>{{ $ingredient->name }}</td>
                      <td>
                        @foreach ($ingredient->meals as $meal)
                          {{ $meal->name }}
                        @endforeach
                      <td>
                        <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                      </td>
                    </tr> 
                    
                      
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
