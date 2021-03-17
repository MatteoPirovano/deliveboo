<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Google font Spartan --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
    <title>Home Page Deliveboo</title>
</head>
<body>
    {{-- <div id="app" class="container">
        <select v-model="category" v-on:change="filterCategory()">
            <option value="" disabled>Scegli la categoria</option>
            <option v-for="category in categories" :value="category.name">@{{category.name}}</option>
        </select>
        <a v-for="restaurant in restaurants" :href="restaurant.slug">@{{restaurant.name}}</a>
    </div> --}}

  {{-- header --}}
  <header>
    <div class="nav_bar">
      <ul>
        <li>
          <img src="{{ asset('images/logo.png') }}" alt="logo">
        </li>
        <li>
          Home
        </li>
        <li>
          Contatti
        </li>
        <li>
          Categorie
        </li>
      </ul>
    </div>

    <div class="container_top" >
      <div class="col_left">
      </div>
      <div class="col_right">
      </div>
    </div>   
    
    <div class="container_bottom">
      <div class="col_left_btm" style="background-image: url({{asset('images/del-rider.jpg')}})">
f
      </div>
      <div class="col_right_btm">
f
      </div>
    </div>
    
  </header>
  {{-- /header --}}

  {{-- main --}}
  <main>

  </main>
  {{-- /main --}}

  {{--footer --}}
  <footer>

  </footer>
  {{-- /footer --}}



  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>