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
                    <tr id="ingredient-{{ $ingredient->id }}">
                      <td>{{ $ingredient->id }}</td>
                      <td>{{ $ingredient->name }}</td>
                      <td>
                        @foreach ($ingredient->meals as $meal)
                          {{ $meal->name }}
                        @endforeach
                      </td>
                      <td>
                        <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('ingredients.show', $ingredient->id) }}" class="btn btn-info">Show</a>
                        <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger delete-ingredient" data-id="{{ $ingredient->id }}">Delete</button>
                        </form>
                      </td>
                    </tr> 
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center mt-3">
                {{ $ingredients->links() }}
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

@section('scripts')
<script>
    $(document).ready(function() {
        // Handle delete button click
        $('.delete-ingredient').on('click', function(e) {
            e.preventDefault();

            let ingredientId = $(this).data('id');
            let url = "{{ route('ingredients.destroy', ':id') }}".replace(':id', ingredientId);

            if (confirm('Are you sure you want to delete this ingredient?')) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        '_method': 'DELETE',
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Remove the ingredient row from the table
                        $('#ingredient-' + ingredientId).remove();
                        alert('Ingredient deleted successfully.');
                    },
                    error: function(xhr) {
                        alert('Something went wrong. Please try again.');
                    }
                });
            }
        });
    });
</script>
@endsection
