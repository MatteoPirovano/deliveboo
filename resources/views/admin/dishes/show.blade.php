@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-wrap">
        <h2>{{$dish->name}}</h2>
        <img src="{{asset('storage/' . $dish->img)}}" alt="PIATTO">
        <p>{{$dish->ingredients}}</p>
        <p>{{$dish->descriptions}}</p>
        <h1>{{$dish->price}}</h1>
        <h4>Disponibilità: 
            @if ($dish->visibility)
            SI
            @else
            NO  
            @endif
        </h4>
        <a class="btn btn-dark" href="{{route('admin.restaurants.dishes.edit', ['restaurant'=>$restaurant->slug, 'dish'=>$dish->slug])}}">Modifica</a>
        <form action="{{route('admin.restaurants.dishes.destroy', ['restaurant'=>$restaurant->slug, 'dish'=>$dish->slug])}}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo piatto?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>
    
</div>
@endsection