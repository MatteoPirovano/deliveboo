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
    </div>
@endsection
