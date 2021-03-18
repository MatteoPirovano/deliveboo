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
    <div id="app" class="container pt-5">
        @foreach ($restaurant->dishes as $dish)
           <div v-on:click="chart('{{$dish->name}}',{{$dish->price}})">{{$dish->name}} - {{$dish->price}}€</div> 
        @endforeach

        <div v-if="total > 0" style="position: fixed; top: 200px; right: 200px; width: 400px; padding:30px; background-color: lightgrey;">
            <div v-for="ordered_dish in order" class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <span>@{{ordered_dish.name}}  x</span>
                    <span>@{{ordered_dish.count}}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center" style="width:100px">
                    <div>
                        <button  class="btn btn-light btn-sm" v-on:click="addDish(ordered_dish.name)">+</button>
                        <button class="btn btn-light btn-sm" v-if="ordered_dish.count > 1" v-on:click="leaveDish(ordered_dish.name)">-</button>
                    </div>
                    <span>@{{ordered_dish.price}}€</span>
                </div>
            </div>
            <hr v-if="total > 0">
            <div v-if="total > 0" class="float-right">
                <span>Total: </span>
                <span >@{{total}}€</span>
                <button v-on:click="deleteOrder()">Delete</button>
            </div>
        </div>

    </div>
    <script src="{{asset('js/details.js')}}"></script>
</body>
</html>