@extends('index')

@section('title', 'Company')

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
              <a href="{{ route('companies.create') }}" class="btn btn-primary float-right">Create Company</a>
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
                  @foreach($companies as $company)
                    <tr>
                      <td>{{ $company->id }}</td>
                      <td>{{ $company->name }}</td>
                      <td>{{ $company->description }}</td>
                      {{-- base link of company website --}}
                      <td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
                      <td>
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" style="width: 100px">
                      </td>
                      <td>
                        <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('companies.show', $company) }}" class="btn btn-success">Show</a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
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
