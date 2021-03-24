<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.73.1/js/hosted-fields.min.js"></script>
    <title>payment</title>
</head>
<body>
    <form class="container" action="{{route('prova')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div id="app">
            <div class="order-summary-box">
                <div class="separate-summary">
                  <h1>
                    Riepilogo dell'ordine:
                  </h1>
                </div>
                <div class="separate-summary input-group-prepend" v-for="(dish,index) in order">
                    
                    <input type="text" class="form-control" :name="'dish_name['+index+']'" :value="dish.name" readonly>
                  
                    
                    <input type="text" class="form-control" :name="'dish_count['+index+']'" :value="dish.count" readonly>
                  
                    
                    <input type="text" class="form-control" :name="'dish_price['+index+']'" :value="dish.price" readonly>
                  
                </div>
                
                <div class="separate-summary">
                    <input type="text" class="form-control" name="price" :value="total" readonly>
                </div>
              </div>
        </div>
        <div class="order-pay-container container">

            <div class="cont-marg-left">
                  <div id="order-summary">
                    <div class="content pay-box">
        
                      <form class="container" method="POST" id="payment-form"
                        action=""
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
        
                        <section>
                        
                            <div class="form-group">
                                <label class="form-label" for="name">Nome</label>
                                <input class="form-control" type="text" id="name" name="client_name" value="" placeholder="Inserisci nome">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="surname">Cognome</label>
                                <input class="form-control" id="surname" type="text" name="client_surname" value="" placeholder="Inserisci cognome">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="client_mail" value="" placeholder="Inserisci email">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="address">Indirizzo</label>
                                <input class="form-control" type="text" id="address" name="client_address" value="" placeholder="Inserisci indirizzo">
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="order_date">Data Ordine</label>
                              <input class="form-control" type="datetime-local" id="order_date" name="order_date" value="" placeholder="Inserisci la data di ordinazione">
                          </div>
                        </section>
        
                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
        
                        <input type="hidden" id="nonce" name="payment_method_nonce" type="text" readonly />
                        <button id="pay-button" class="button" type="submit" v-on:click="deleteOrder()"><span>Effettua il Pagamento</span></button>
                    </form>

                    
        
                      
                    <script src="{{asset('js/payment.js')}}"></script>
                      <script>
                        var form = document.querySelector('#payment-form');
                        var client_token = "sandbox_fw6qt9y6_vdk2gbc86h7jcfzs";
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
                      
        
                    </div>
        
                  </div>
            </div>
          </div>
        </div>
        <button type="submit">Conferma</button>
    </form>
         
</body>
</html>
