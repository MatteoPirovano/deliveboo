@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success mt-2 ml-2">
        {{ session('message') }}
    </div>
    @endif

    <div class="d-flex flex-wrap">
        @foreach ($dishes as $dish)
        <div class="card">
            <h2>{{$dish->name}}</h2>
            <a class="btn btn-secondary" href="{{route('admin.restaurants.dishes.show', ['restaurant' => $restaurant->slug, 'dish' => $dish->slug])}}">Mostra</a>
        </div>
        @endforeach
    </div>
    <a class="btn btn-dark" href="{{route('admin.restaurants.dishes.create', $restaurant->slug)}}">Crea Piatto</a>
</div>
@endsection
