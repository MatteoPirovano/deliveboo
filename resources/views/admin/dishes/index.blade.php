@extends('admin.layouts.main')

@section('aside')
    
@endsection

@section('main')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success mt-2 ml-2">
        {{ session('message') }}
    </div>
    @endif
    
    <a class="plate_ms" href="{{route('admin.restaurants.dishes.create', $restaurant->slug)}}"> 
        <i class="fas fa-plus plus_ms">
            <span> Crea Piatto </span>
        </i>
    </a>
    {{-- <a class="btn btn-secondary float-right" href="{{ route('admin.restaurants.index') }}">Indietro</a> --}}
    <div class="d-flex flex-wrap">
        @foreach ($restaurant->dishes->sortBy('name') as $dish)
        <div style="max-width: 300px" class="card m-2 d-flex justify-content-end">
            <img class="img_ms" src="{{asset('storage/' . $dish->img)}}" alt="PIATTO">
            <h2 style="word-break: normal">{{$dish->name}}</h2>
                {{-- <img class="img-thumbnail max-width: 100%" src="{{asset('images/placeholder.png')}}" alt="IMMAGINE"> --}}
            <a class="btn btn-info" href="{{route('admin.restaurants.dishes.show', ['restaurant' => $restaurant->slug, 'dish' => $dish->slug])}}">Mostra</a>
        </div>
        @endforeach
    </div>
</div>
@endsection

