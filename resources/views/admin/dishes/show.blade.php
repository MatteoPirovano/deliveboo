@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <form class="float-right" action="{{route('admin.restaurants.dishes.destroy', ['restaurant'=>$restaurant->slug, 'dish'=>$dish->slug])}}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo piatto?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
        <h2>{{$dish->name}}</h2>
        {{-- <img src="{{asset('storage/' . $dish->img)}}" alt="PIATTO"> --}}
        <img style="max-width: 300px" class="img-thumbnail" src="{{asset('images/placeholder.png')}}" alt="IMMAGINE">
        <p>{{$dish->ingredients}}</p>
        <p>{{$dish->descriptions}}</p>
        <h1>{{$dish->price}}€</h1>
        <h4>Disponibilità: 
            @if ($dish->visibility)
            SI
            @else
            NO  
            @endif
        </h4>
        <a class="btn btn-dark" href="{{route('admin.restaurants.dishes.edit', ['restaurant'=>$restaurant->slug, 'dish'=>$dish->slug])}}">Modifica</a>
        <a class="btn btn-info" href="{{route('admin.restaurants.dishes.index', $restaurant->slug)}}">Torna a menù</a>
    </div>
    
</div>
@endsection