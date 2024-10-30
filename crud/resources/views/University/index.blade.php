@extends('index')

@section('title', 'University')

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
              <a href="{{ route('universities.create') }}" class="btn btn-primary float-right">Create University</a>
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
                    <th>DESCRIPTION</th>
                    <th>WEBSITE</th>
                    <th>LOGO</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($universities as $university)
                    <tr>
                      <td>{{ $university->id }}</td>
                      <td>{{ $university->name }}</td>
                      <td>{{ $university->description }}</td>
                      {{-- base link of university website --}}
                      <td><a href="{{ $university->website }}" target="_blank">{{ $university->website }}</a></td>
                      <td>
                        <img src="{{ asset('images' . $university->logo) }}" alt="{{ $university->name }}" style="width: 100px">
                      </td>
                      <td>
                        <a href="{{ route('universities.edit', $university) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('universities.show', $university) }}" class="btn btn-success">Show</a>
                        <form action="{{ route('universities.destroy', $university) }}" method="POST" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <!-- Pagination Links -->
              <div class="d-flex justify-content-center mt-3">
                {{ $universities->links() }}
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