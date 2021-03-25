<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Spartan:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <title>PaymentSuccess</title>
        
        <link href="{{ asset('css/paymentSuccess.css') }}" rel="stylesheet">
</head>
<body>

  {{-- header --}}
  <header>
    
    <div class="nav_bar" id="nav_bar_res">     

      <div class="cont_img" id="cont_img_res">
        <img src="{{ asset('images/logo.png') }}" alt="logo">
        <ul>
          <li>
            <a href="{{ route('homepage') }}">Home</a>
          </li>
          <li>
            <a href="#contact">Contatti</a>
          </li>
        </ul>
      </div>

      <div class="cont_list" id="cont_list_res">        
        <div class="dropdown" id="dropdown_id">
          <button class="btn dropdown-toggle mx-5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lavora con noi
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            {{-- <a class="dropdown-item" href="{{ route('admin.restaurants.index') }}">Login</a>
            <a class="dropdown-item" href="{{ route('register') }}">Registrati</a> --}}
            @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> --}}
                  <a id="user_name" href="{{ route('admin.restaurants.index') }}">{{ Auth::user()->name }}</a> 
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
           </form>

              {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                 
              </div> --}}
          </li>
      @endguest
          </div>
        </div>          
      </div>

    </div>

  </header>
  {{-- /header --}}

    <section class="card_payment_ms">
        <div class="img_card_section_ms">
            <img src="{{asset('images/success.png') }}" alt="Success">
        </div>
        <div class="main_card_section_ms">
            <h1>
                Pagamento avvenuto con successo
            </h1>                      
        </div>
        <div class="btn_card_section_ms">
            <a class="btn btn-info" href="{{ route('homepage')}} ">Torna alla home</a>
        </div>
    </section>
    <script src="{{asset('js/checkout.js')}}"></script>
</body>
</html>




