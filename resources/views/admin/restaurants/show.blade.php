@extends('admin.layouts.main')

@section('aside')
    
@endsection

@section('main')
    <div class="container">
        <h2>{{$restaurant->name}}</h2>
        <img src="{{asset('storage/' . $restaurant->img)}}" alt="IMMAGINE">
        {{-- <span style="display: block; width: 200px">
            <img class="img-thumbnail " src="{{asset('images/placeholder.png')}}" alt="IMMAGINE">
        </span> --}}
        <h3 class="mt-3">Partita IVA: {{$restaurant->p_iva}}</h3>
        <h3 class="mb-3">Indirizzo: {{$restaurant->address}}</h3>
        {{-- <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary float-right">Home</a> --}}
        <a class="btn btn-dark" href="{{route('admin.restaurants.dishes.create', $restaurant->slug)}}">Crea Piatto</a>
        {{-- <a class="btn btn-info" href="{{route('admin.restaurants.dishes.index', $restaurant->slug)}}">Vedi Menù</a> --}}
        <form action="{{route('admin.restaurants.destroy', $restaurant->slug)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger float-right">Elimina</button>
        </form>
        <a class="btn btn-secondary" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">Modifica</a>
    </div>
    
@endsection