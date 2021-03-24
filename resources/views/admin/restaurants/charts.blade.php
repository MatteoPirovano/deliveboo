@extends('admin.layouts.main')

@section('aside')

@endsection

@section('main')
    {{-- <div class="statistics_restaurant_ms"> --}}
      <div class="container_charts">

        <div class="container">
          @dump($orders);
          <canvas id="myCanvas">

          </canvas>
        </div>
      </div>
    {{-- </div> --}}

    <script>
      var ctx = document.getElementById('myCanvas').getContext('2d');
      let myLabels = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
      let myData = ;
    

      var chart = new Chart(myCanvas, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: {
            labels: myLabels,
            datasets: [{
              label: 'Popolazione',
              backgroundColor: '#2f4f4f',
              /* borderColor: 'rgb(255, 99, 132)', */
              data: myData
            }]
          },

          // Configuration options go here
          options: {
            title: {
              display: true,
              text: 'Top 10 città italiane',
              fontSize: 25
            }
          }
        });
    </script>
@endsection