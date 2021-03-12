@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($restaurants as $restaurant)
        <h2>{{$restaurant->name}}</h2>
        <ul>
            @foreach ($restaurant->categories as $category)
                <h3>{{$category->name}}</h3>
            @endforeach
        </ul>
        <a class="btn btn-secondary" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">Modifica</a>
        @endforeach
        <a class="btn btn-success" href="{{ route('admin.restaurants.create') }}">Aggiungi un ristorante</a>
    </div>
    
@endsection
