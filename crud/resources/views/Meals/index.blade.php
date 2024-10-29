@extends('index')

@section('title', 'Meals')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Meals</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Meals</li>
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
              <h3 class="card-title">Meal List</h3>
              <a href="{{ route('meals.create') }}" class="btn btn-primary float-right">Create Meal</a>
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
                    <th>Ingredients</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($meals as $meal)
                    <tr>
                      <td>{{ $meal->id }}</td>
                      <td>{{ $meal->name }}</td>
                      <td>
                        @foreach($meal->ingredients as $ingredient)
                          {{ $ingredient->name }}
                        @endforeach
                      </td>
                      <td>
                        <a href="{{ route('meals.edit', $meal) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('meals.show', $meal) }}" class="btn btn-success">Show</a>
                        <form action="{{ route('meals.destroy', $meal) }}" method="POST" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- Paginate --}}
              <div class="d-flex justify-content-center">
                {!! $meals->links() !!}
              </div>
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
