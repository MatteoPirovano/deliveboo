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

        {{-- <div class="card">
            <h2>{{$dish->name}}</h2>
            <a class="btn btn-secondary" href="{{route('admin.restaurants.dishes.show', ['restaurant' => $restaurant->slug, 'dish' => $dish->slug])}}">Mostra</a>
        </div>
        @endforeach --}}
    </div>
    
</div>
@endsection