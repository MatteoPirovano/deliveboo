@extends('admin.layouts.main')

@section('aside')
    
@endsection

@section('main')
    <div class="container flex_ms">
        <div class="card_h_ms mb-3">
            <div class="card">

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

        <div class="statistics_restaurant_ms">
            <img src="{{ asset('images/stat-restaurant.jpg') }}" alt="">
        </div>     
    </div>
    
@endsection