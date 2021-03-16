@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success mt-2 ml-2">
        {{ session('message') }}
    </div>
    @endif
    <a class="btn btn-success" href="{{ route('admin.restaurants.create') }}">Aggiungi un ristorante</a>
    @foreach ($restaurants as $restaurant)
        <h2 class="bg-white mt-5">{{$restaurant->name}}</h2>
        <ul>
            @foreach ($restaurant->categories as $category)
            <h3>{{$category->name}}</h3>
            @endforeach
        </ul>
        <form action="{{route('admin.restaurants.destroy', $restaurant->slug)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger float-right">Elimina</button>
        </form>
        <a class="btn btn-secondary" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">Modifica</a>
        <a class="btn btn-dark" href="{{ route('admin.restaurants.show', $restaurant->slug) }}">Mostra</a>
        <a class="btn btn-info" href="{{route('admin.restaurants.dishes.index', $restaurant->slug)}}">Vedi Menù</a>
        @endforeach
    </div>
@endsection
