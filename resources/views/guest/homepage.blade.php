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
      <ul>
        <li>
          <img src="{{ asset('images/logo.png') }}" alt="logo">
        </li>
        <li>
          <a href="#">Home</a>
        </li>
        <li>
          <a href="#contact">Contatti</a>
        </li>
        <li>
          <a href="#register">Lavora con noi</a>
        </li>
        <li>
         {{--  <a href="">Scegli cosa mangiare</a> --}}
         <select v-model="category" v-on:change="filterCategory()">
            <option value="" disabled>Scegli la categoria</option>
            <option v-for="category in categories" :value="category.name">@{{category.name}}</option>
        </select>
        </li>
      </ul>
    </div>

    <div class="container_top" data-aos="zoom-out">
      <div class="col_left">
      </div>
      <div class="col_right">
      </div>
    </div>   
    
    <div class="container_bottom" data-aos="zoom-in-up">
      <div class="col_left_btm" style="background-image: url({{asset('images/del-rider.jpg')}})">

      </div>
      <div class="col_right_btm">

      </div>
    </div>
    
  </header>
  {{-- /header --}}

  {{-- main --}}
  <main>
    <div class="container_main">
      <div class="title_cont" data-aos="fade-down"
          data-aos-easing="linear"
          data-aos-duration="1200" v-if="!category == '' "
        >
        <h2>LA TUA SCELTA</h2>
        <h3 style="text-transform: uppercase">@{{ category }}</h3>
      </div>

      {{-- Sezione card --}}
      <div class="container d-flex justify-content-center flex-wrap" data-aos="fade-down-right">
        <div class="card" v-for="restaurant in restaurants">
          <img src="{{ asset('images/food.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title">@{{restaurant.name}}</h2>
            <a :href="restaurant.slug" class="btn btn-success">Menu</a>
          </div>
        </div>

        {{-- <div class="card">
          <img src="{{ asset('images/food.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title">Dal Cinese</h2>
            <a href="#" class="btn btn-success">Menu</a>
          </div>
        </div>

        <div class="card">
          <img src="{{ asset('images/food.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title">Dal Cinese</h2>
            <a href="#" class="btn btn-success">Menu</a>
          </div>
        </div>

        <div class="card">
          <img src="{{ asset('images/food.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title">Dal Cinese</h2>
            <a href="#" class="btn btn-success">Menu</a>
          </div>
        </div>

        <div class="card">
          <img src="{{ asset('images/food.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title">Dal Cinese</h2>
            <a href="#" class="btn btn-success">Menu</a>
          </div>
        </div>

        <div class="card">
          <img src="{{ asset('images/food.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title">Dal Cinese</h2>
            <a href="#" class="btn btn-success">Menu</a>
          </div>
        </div> --}}
      </div>
      {{-- /Sezione card --}}

      {{-- /Sezione fine main --}}
      <div class="container_main_bottom">
        <div class="img_phone" data-aos="zoom-in">
          <img src="{{ asset('images/del-app.jpg') }}" alt="app-phone">
        </div>
        <div class="download_app">
          <h3>Sempre al tuo fianco</h3>
          <p>Scarica l'app e scegli subito cosa mangiare</p>
          <div class="seach_app">
            <img src="{{ asset('images/android.png') }}" alt="ios-app" style="width: 50px; height:50px">
            <img src="{{ asset('images/ios.png') }}" alt="ios-app" style="width: 50px; height: 50px">
          </div>
        </div>
        <div class="img_rider" data-aos="zoom-in">
        </div>
      </div>
      {{-- /Sezione fine main --}}
    </div>
  </main>
  {{-- /main --}}

  {{--footer --}}
  <footer>
    <a id="contact"></a>
    <a id="register"></a>


    <div class="container_footer" >
      <div class="footer_left" data-aos="flip-right">
s
      </div>

      <div class="footer_center" data-aos="flip-left">
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

      <div class="footer_right" data-aos="flip-right">
        <h3>LAVORA CON NOI</h3>
        <a href="" class="btn btn-success">Registrati</a>
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