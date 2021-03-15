@extends('layouts.app')

@section('content')
    
  
    <div class="container">
      <h1 class="mb-5">Aggiungi il tuo piatto</h1>
        {{-- Div in caso di errori di compilazioni del form --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- /Div in caso di errori di compilazioni del form --}}
    
      <form action="{{ route('admin.restaurants.dishes.update', ['restaurant'=>$restaurant->slug, 'dish'=>$dish->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$dish->name}}">
        </div>

        <div class="form-group">
          <label class="d-block" for="img">Aggungi immagine</label>
          <input type="file" id="img" name="img" accept="image/*">
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredienti</label>
            <textarea name="ingredients" id="ingredients" class="form-control" rows="10">{{$dish->ingredients}}"</textarea>
        </div>

        <div class="form-group">
          <label for="courses" class="form-label">Tipo di portata</label>
          <input type="text" class="form-control @error('courses') is-invalid @enderror" name="courses" id="courses" value="{{$dish->courses}}">
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" class="form-control" rows="10">{{$dish->description}}"</textarea>
        </div>

        <div class="form-group">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{$dish->price}}">
        </div>
        <div>Visibilità</div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visibility" value='1' @if($dish->visibility) checked @endif>
            <label class="form-check-label">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visibility" value='0' @if(!$dish->visibility) checked @endif>
            <label class="form-check-label">
                No
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Salva</button>
        <a href="{{ route('admin.restaurants.dishes.index', $restaurant->slug) }}" class="btn btn-secondary mt-4">Home</a>
      </form>
    </div>
  
    
@endsection