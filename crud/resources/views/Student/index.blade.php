@extends('index')

@section('title', 'Student')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
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
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
              <a href="{{ route('students.create') }}" class="btn btn-primary float-right">Create Student</a>
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
                    <th>NAME</th>
                    <th>PHONE</th>
                    <th>IMAGE</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($students as $student)
                    <tr>
                      <td>{{ $student->id }}</td>
                      <td>{{ $student->name }}</td>
                      <td>{{ $student->phone }}</td>
                      <td><img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}" width="50"></td>
                      <td>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-success">Show</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {{ $students->links() }}
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
