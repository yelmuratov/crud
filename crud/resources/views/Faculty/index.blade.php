@extends('index')

@section('title', 'Faculties')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Faculties</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Faculties</li>
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
              <h3 class="card-title">List of Faculties</h3>
              <a href="{{ route('faculties.create') }}" class="btn btn-primary float-right">Create Faculty</a>
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
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($faculties as $faculty)
                    <tr>
                      <td>{{ $faculty->id }}</td>
                      <td>{{ $faculty->name }}</td>
                      <td>
                        <a href="{{ route('faculties.show', $faculty) }}" class="btn btn-info">View</a>
                        <a href="{{ route('faculties.edit', $faculty) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('faculties.destroy', $faculty) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this faculty?')">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="3">No faculties available.</td>
                    </tr>
                  @endforelse
              </table>

              <!-- Pagination Links -->
              <div class="d-flex justify-content-center mt-3">
                {{ $faculties->links() }}
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
