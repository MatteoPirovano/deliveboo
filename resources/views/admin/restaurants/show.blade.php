@extends('admin.layouts.main')

@section('aside')
    
@endsection

@section('main')
    <div class="container flex_ms">
        <div class="card_h_ms mb-3">
            <div class="card card_restaurant_show_ms">

                <div class="card_restaurant_img_ms">
                    <img class="card-img-top" src="{{asset('storage/' . $restaurant->img)}}" alt="IMMAGINE">
                </div>

                <div class="card-body">

                    <div class="card_restaurant_info_ms">
                        <h2 class="card-title">{{$restaurant->name}}</h2>
                        <p class="card-text">Partita IVA: {{$restaurant->p_iva}}</p>
                        <p class="card-text">Partita IVA: {{$restaurant->address}}</p>
                    </div>

                    <div class="card_restaurant_bnt_ms">
                        <a class="btn btn-dark" href="{{route('admin.restaurants.dishes.create', $restaurant->slug)}}">Crea Piatto</a>
                        <a class="btn btn-secondary" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">Modifica</a>

                        <form action="{{route('admin.restaurants.destroy', $restaurant->slug)}}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo ristorante?')">
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