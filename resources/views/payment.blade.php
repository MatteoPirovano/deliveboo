<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
    <script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.73.1/js/hosted-fields.min.js"></script>
    <title>payment</title>
</head>
<body>
  @if (session('message'))
    <div class="alert alert-success mt-2 ml-2">
        {{ session('message') }}
    </div>
  @endif
    
    <div class="order-pay-container container">
      <div class="cont-marg-left">
        <div id="order-summary">
          <div class="content pay-box">
            <form class="container" method="post" id="payment-form" action="{{url('/checkout')}}">
              @csrf
              @method('post')
              <section>
                <div id="app">
                  <div class="order-summary-box">
                    <div class="separate-summary">
                      <h1>
                        Riepilogo dell'ordine
                      </h1>
                    </div>
                    <div class="logo_ms">
                      <img src="{{ asset("images/logo.png") }}" alt="">
                    </div>
                    <div v-for="(dish,index) in order">
                      <span>@{{ dish.count }} x </span>
                      <input class="input_ms" type="text" :name="'dish_name['+index+']'" :value="dish.name" readonly>
                      <input type="hidden" :name="'dish_count['+index+']'" :value="dish.count" readonly>
                      <input id="price" class="input_ms price" type="hidden"  :name="'dish_price['+index+']'" :value="dish.price" readonly>
                      <p>@{{ dish.price.toFixed(2) }}</p><span>&euro;</span>
                    </div>
                    <hr>
                      <label for="amount">
                        <span class="input-label">Totale</span>
                        {{-- <h4>@{{total.toFixed(2)}}€</h4> --}}
                        <input id="total" class="input_ms" type="tel" id="amount" name="amount" :value="total" min="1" readonly>
                      </label><span>&euro;</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label" for="name">Nome</label>
                  <input class="form-control" type="text" id="name" name="client_name" value="{{old('client_name')}}" placeholder="Inserisci nome">
                </div>
                <div class="form-group">
                  <label class="form-label" for="surname">Cognome</label>
                  <input class="form-control" id="surname" type="text" name="client_surname" value="{{old('client_surname')}}" placeholder="Inserisci cognome">
                </div>
                <div class="form-group">
                  <label class="form-label" for="email">Email</label>
                  <input class="form-control" type="email" id="email" name="client_mail" value="{{old('client_mail')}}" placeholder="Inserisci email">
                </div>
                <div class="form-group">
                  <label class="form-label" for="address">Indirizzo</label>
                  <input class="form-control" type="text" id="address" name="client_address" value="{{old('client_address')}}" placeholder="Inserisci indirizzo">
                </div>
                <div class="form-group">
                  <label class="form-label" for="order_date">Data Ordine</label>
                  <input class="form-control" type="datetime-local" id="order_date" name="order_date" value="{{old('order_date')}}" placeholder="Inserisci la data di ordinazione">
                </div>
              </section>
              <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
              </div>
              <input type="hidden" id="nonce" name="payment_method_nonce" type="text" readonly />
              <button id="pay-button" class="button" type="submit" v-on:click="deleteOrder()">
                <span>Effettua il Pagamento</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  <script src="{{asset('js/payment.js')}}"></script>
  <script>
    var form = document.querySelector('#payment-form');
    var client_token ="{{$token}}";
    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      // paypal: {
      //   flow: 'vault'
      // }
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        return;
      }
      form.addEventListener('submit', function (event) {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            return;
          }
          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
  </script>   
</body>
</html>
