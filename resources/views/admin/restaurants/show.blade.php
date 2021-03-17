@extends('admin.layouts.main')

@section('aside')
    
@endsection

@section('main')
    <div class="container flex_ms">        
        <section claass="card_ms">

            <div class="card_h_ms card mb-3">
                <div class="card card_h_ms">
                <img class="card-img-top" src="{{asset('storage/' . $restaurant->img)}}" alt="IMMAGINE">
                <div class="card-body">
                    <h2 class="card-title">{{$restaurant->name}}</h2>
                    <p class="card-text">Partita IVA: {{$restaurant->p_iva}}</p>
                    <p class="card-text">Partita IVA: {{$restaurant->address}}</p>

                    <div>
                        <a class="btn btn-dark" href="{{route('admin.restaurants.dishes.create', $restaurant->slug)}}">Crea Piatto</a>
                        <a class="btn btn-secondary" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">Modifica</a>
                    </div>
                    <div class="delete_ms">
                        <form action="{{route('admin.restaurants.destroy', $restaurant->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>

            {{-- <img src="{{asset('storage/' . $restaurant->img)}}" alt="IMMAGINE">
            
            <h2>{{$restaurant->name}}</h2>
            
            <h3 class="mt-3">Partita IVA: {{$restaurant->p_iva}}</h3>
            <h3 class="mb-3">Indirizzo: {{$restaurant->address}}</h3>
            <a class="btn btn-dark" href="{{route('admin.restaurants.dishes.create', $restaurant->slug)}}">Crea Piatto</a>
            <form action="{{route('admin.restaurants.destroy', $restaurant->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
            <a class="btn btn-secondary" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">Modifica</a>
         --}}

        
        
    </div>
    
@endsection