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
        </div>
        @endforeach
    </div>
    
</div>
@endsection

