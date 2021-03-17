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
    <title>Home Page</title>
</head>
<body>
    <div id="app" class="container">
        <select v-model="category" v-on:change="filterCategory()">
            <option value="" disabled">Scegli la categoria</option>
            <option v-for="category in categories" :value="category.name">@{{category.name}}</option>
        </select>
        <div v-for="restaurant in restaurants">@{{restaurant.name}}</div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>