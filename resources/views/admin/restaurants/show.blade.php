@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$restaurant->name}}</h2>
        <img src="{{asset('storage/' . $restaurant->img)}}" alt="IMMAGINE">
        <h3>{{$restaurant->p_iva}}</h3>
        <h3>{{$restaurant->address}}</h3>
        <a class="btn btn-dark" href="{{route('admin.restaurants.dishes.create', $restaurant->slug)}}">Crea Piatto</a>
        <a href="{{route('admin.restaurants.dishes.index', $restaurant->slug)}}">Vedi Menù</a>
    </div>
    
@endsection