<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <section class="flex_ms">

        <aside class="container_ms">
            <div>     
                
                <h1>CIAO</h1>
                
                @yield('aside')

                @foreach ($restaurants as $restaurant)
                    <h2 class="bg-white mt-5">{{$restaurant->name}}</h2>
                    <ul>
                        @foreach ($restaurant->categories as $category)
                        <h3>{{$category->name}}</h3>
                        @endforeach
                    </ul>
                    <form action="{{route('admin.restaurants.destroy', $restaurant->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-right">Elimina</button>
                    </form>
                    <a class="btn btn-secondary" href="{{ route('admin.restaurants.edit', $restaurant->slug) }}">Modifica</a>
                    <a class="btn btn-dark" href="{{ route('admin.restaurants.show', $restaurant->slug) }}">Mostra</a>
                    <a class="btn btn-info" href="{{route('admin.restaurants.dishes.index', $restaurant->slug)}}">Vedi Menù</a>
                @endforeach  
            </div>
        </aside>

        <main class="main_ms">
            @yield('main')
        </main>

    </section>    
</body>
</html>
