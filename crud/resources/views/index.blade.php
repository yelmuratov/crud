@extends('layout') <!-- Assuming 'layout' is your main layout file -->

@section('title', 'Meals and Ingredients')

@section('content')
<div class="container mt-5">
    <h2>Meals and Ingredients</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Meal Name</th>
                <th>Ingredients</th>
            </tr>
        </thead>
        <tbody>
            @foreach($meals as $meal)
                <tr>
                    <td>{{ $meal['id'] }}</td>
                    <td>{{ $meal['name'] }}</td>
                    <td>
                        @if(count($meal['ingredients']) > 0)
                            <ul>
                                @foreach($meal['ingredients'] as $ingredient)
                                    <li>{{ $ingredient['name'] }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>No ingredients listed</em>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
