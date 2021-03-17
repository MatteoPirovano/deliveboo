<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Details</title>
</head>
<body>
    <div id="app" class="container">
        @foreach ($restaurant->dishes as $dish)
           <div v-on:click="chart('{{$dish->name}}')">{{$dish->name}}</div> 
        @endforeach

    </div>
    <script src="{{asset('js/details.js')}}"></script>
</body>
</html>