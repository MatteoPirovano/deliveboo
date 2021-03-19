@extends('admin.layouts.main')

@section('aside')
    
@endsection

@section('main')
<div class="container flex_ms dishes_show_container_ms">

    <div class="left_dishes_show_container_ms">
        <h1>{{$dish->name}}</h1>        
        <p><strong>Ingredienti:</strong> {{$dish->ingredients}}</p>
        <p><strong>Descrizione:</strong> {{$dish->description}}</p>
        <h2><strong>Prezzo:</strong> {{$dish->price}}€</h2>
        <h3><strong>Disponibilità: </strong>
            @if ($dish->visibility)
            SI
            @else
            NO  
            @endif
        </h3>
        <a class="btn btn-dark" href="{{route('admin.restaurants.dishes.edit', ['restaurant'=>$restaurant->slug, 'dish'=>$dish->slug])}}">Modifica</a>
        <a class="btn btn-info" href="{{route('admin.restaurants.dishes.index', $restaurant->slug)}}">Torna a menù</a>
    </div>

    <div class="right_dishes_show_container_ms">
        <form class="float-right" action="{{route('admin.restaurants.dishes.destroy', ['restaurant'=>$restaurant->slug, 'dish'=>$dish->slug])}}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo piatto?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
        
        @if(!empty($dish->img))
            <img src="{{asset('storage/' . $dish->img)}}" alt="PIATTO">
        @else
            <img src="{{ asset('images/placeholder.png') }}" alt="PLACEHOLDER">
        @endif
        
    </div>
    
</div>
@endsection