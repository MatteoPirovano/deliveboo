<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- Styles -->
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <title>Details</title>
</head>
<body>
    <div id="app">
        <header>
            <div class="nav_bar">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
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
                <div class="chart" v-if="total > 0" v-on:click="changeVisibility()">
                    <div v-if="total > 0" class="d-flex justify-content-between align-items-center">
                      <i class="fas fa-shopping-cart"></i>
                      <span>@{{count}}</span>
                      <span>|</span>
                      <span>@{{total}}€</span>
                    </div>
                </div>
              </div>
        </header>
        <div class="jumbotron" style="background-image: url({{asset('storage/' . $restaurant->img)}})">
            <h1 class="float-right">{{$restaurant->name}}</h1>
        </div>
        <main class="container">
            @foreach ($restaurant->dishes as $dish)
                <div class="card">
                    <img src="{{asset('storage/' . $dish->img)}}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="info">
                            <h3 class="card-title">{{"$dish->name"}}</h2>
                            <p><strong>Ingredienti: </strong>{{$dish->ingredients}}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><strong>Prezzo: </strong>{{$dish->price}}€</span>
                            <button v-if="inOrder('{{$dish->name}}') == false" class="btn btn-secondary" v-on:click="chart('{{$dish->name}}',{{$dish->price}})">Aggiungi al carrello</button>
                            <div v-else>
                                <button  class="btn btn-light btn-sm" v-on:click="addDish('{{$dish->name}}')">+</button>
                            </div>
                        </div>
                      
                    </div>
                </div>
            @endforeach
            <div class="chart" :class="chartVisibility" v-if="total > 0">
                <div class="chart_header d-flex justify-content-between align-items-center">
                  <img src="{{asset('images/logo.png')}}" alt="LOGO">
                  <button class="btn" v-on:click="deleteOrder()">Cancella Ordine</button>
                  <button class="btn" v-on:click="deleteOrder()">Conferma Ordine</button>
                </div>
                <div v-for="ordered_dish in order" class="d-flex justify-content-between align-items-center mb-3" v-if="ordered_dish.count > 0">
                    <div>
                        <span>@{{ordered_dish.name}}  x</span>
                        <span>@{{ordered_dish.count}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center" style="width:100px">
                        <div>
                            <button  class="btn btn-light btn-sm" v-on:click="addDish(ordered_dish.name)">+</button>
                            <button class="btn btn-light btn-sm" v-if="ordered_dish.count > 1" v-on:click="leaveDish(ordered_dish.name)">-</button>
                        </div>
                        <span v-if="ordered_dish.count > 0">@{{ordered_dish.price}}€</span> <span class="btn" v-on:click="deleteDishOrder(ordered_dish.name)">Delete</span>
                    </div>
                </div>
                <hr v-if="total > 0">
                <div v-if="total > 0" class="float-right">
                    <span>Total: </span>
                    <span >@{{total}}€</span>
                </div>
            </div>
        </main>
        <footer>
            <a id="contact"></a>
            <a id="register"></a>
        
        
            <div class="container_footer" >
              <div class="footer_left" data-aos="flip-right">
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
                <a href="{{route('login')}}" class="btn btn-success">Registrati</a>
              </div>
        
            </div>
          </footer>
    <script src="{{asset('js/details.js')}}"></script>
</body>
</html>