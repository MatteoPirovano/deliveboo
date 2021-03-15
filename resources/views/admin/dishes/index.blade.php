@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success mt-2 ml-2">
        {{ session('message') }}
    </div>
    @endif
    @foreach ($dishes as $dish)
    <h2>{{$dish->name}}</h2>
    @endforeach
    VAFFANCULO
</div>
@endsection

