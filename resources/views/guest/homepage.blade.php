<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    {{-- Google font Spartan --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Aos library - scroll effects -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
    <title>Home Page Deliveboo</title>
</head>
<body>
    <div id="app">
        {{-- <select v-model="category" v-on:change="filterCategory()">
            <option value="" disabled>Scegli la categoria</option>
            <option v-for="category in categories" :value="category.name">@{{category.name}}</option>
        </select>
        <a v-for="restaurant in restaurants" :href="restaurant.slug">@{{restaurant.name}}</a>
    </div> --}}

  {{-- header --}}
  <header>
    
    <div class="nav_bar">
      
      <div class="cont_img mb-2">
        <img src="{{ asset('images/logo.png') }}" alt="logo">
      </div>

      <div class="cont_list">
        <ul>
          <li>
            <a href="#">Home</a>
          </li>
          <li>
            <a href="#contact">Contatti</a>
          </li>
          <li>
            <a href="#register">Lavora con noi</a>
          </li>
        </ul>
      </div>

    </div>
    <div class="layover">
      <h1>Tutto quello di cui hai bisogno <br> in un click</h1>
    </div>
  </header>
  {{-- /header --}}

  {{-- main --}}
  <main>
    <div class="container_main">  
      {{-- Categories --}} 
      <div class="row_categories">
        <div class="icons" v-for="(category, index in categories" v-on:click="filterCategory(category.name)">
          <h5>@{{ category.name }}</h5>
        </div>
      </div>   
      {{-- Categories --}} 

      {{-- all restaurants --}}
      <div class="container d-flex justify-content-center flex-wrap" v-if="restaurants.lenght > 0">
        <div class="card" v-for="restaurant in restaurants">      
          <img :src="'storage/' + restaurant.img" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title">@{{restaurant.name}}</h2>
            <a :href="restaurant.slug" class="btn btn_orange">Menu</a>
          </div>
        </div>
      </div>
      {{-- /all restaurants --}}

      {{-- Restaurants --}}
      <div class="container d-flex justify-content-center flex-wrap">
        <div class="card" v-for="restaurant in restaurants">      
          <img :src="'storage/' + restaurant.img" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title">@{{restaurant.name}}</h2>
            <a :href="restaurant.slug" class="btn btn_orange">Menu</a>
          </div>
        </div>
      </div>
      {{-- Restaurants --}}
    </div>
  </main>
  {{-- /main --}}

  {{--footer --}}
  <footer>
    <a id="contact"></a>
    <a id="register"></a>


    <div class="container_footer" >
      <div class="footer_left">
        <img src="{{asset('images/del-rider.jpg')}}" alt="">
      </div>

      <div class="footer_center">
        <h3>TEAM DI SVILUPPO</h3>
        <ul>
          <li>
            <a href="https://www.linkedin.com/in/nicola-porta-846ba6207/" class="btn btn-dark"><i class="fas fa-user-tie"></i>Nicola Porta</a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/vincenzo-antignani-195710114/" class="btn btn-dark"><i class="fas fa-user-astronaut"></i>Vincenzo Antignani</a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/marian-corlade-703958208/" class="btn btn-dark"><i class="fas fa-user-tag"></i>Marian Corlade</a>            
          </li>
          <li>
            <a href="https://www.linkedin.com/in/cristian-mihai-trusca/" class="btn btn-dark"><i class="fas fa-user-ninja"></i>Cristian Mihai Trusca</a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/matteopirovano/" class="btn btn-dark"><i class="fas fa-user-plus"></i>Matteo Pirovano</a>
          </li>
        </ul>
      </div>

      <div class="footer_right">
        <img src="{{ asset('images/del-app.jpg') }}" alt="app-phone">
      </div>

    </div>
  </footer>
  {{-- /footer --}}


  </div> {{-- fine id=app --}}


  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init(
      {
        offset: 200, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1000, // values from 0 to 3000, with step 50ms
      }
    );
  </script>
</body>
</html>