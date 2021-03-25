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




