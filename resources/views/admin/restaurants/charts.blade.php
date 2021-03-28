@extends('admin.layouts.main')

@section('aside')

@endsection
@section('main')
    {{-- <div class="statistics_restaurant_ms"> --}}
    <div class="container d-flex flex-column">
      <div class="container_charts mb-4">

        {{-- <div class="container"> --}}
          
          <canvas id="myCanvas">

          </canvas>
      </div>
      <div class="container_charts">
          <canvas id="year">

          </canvas>
      </div>
    </div>
      
        {{-- </div> --}}
    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      var ctx = document.getElementById('myCanvas').getContext('2d');
      let myLabels = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
      let slug = @json($restaurant->slug);
      let myData = [];
      $.ajax({
        url: "http://127.0.0.1:8000/api/" + slug + "/statistics",
        type: "GET",
        dataType: 'json',
        success: function(data){
          newdata = data.map(
            element => {
              return element.toFixed(2);
          });
          chart.data.datasets[0].data = newdata;
          chart.update();
        }
});
      var chart = new Chart(myCanvas, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: {
            labels: myLabels,
            datasets: [{
              label: '€',
              backgroundColor: '#F39200',
              data: myData
            }]
          },
          

          // Configuration options go here
          options: {
            responsive:true,
            maintainAspectRatio:false,
            title: {
              display: true,
              text: 'Ordini per mese',
              fontSize: 25
            },
            layout:{
            padding:30,
            }
          }
        });
    </script>
    <script>
      var ctx2 = document.getElementById('year').getContext('2d');
      let myLabels2 = ['2020', '2021'];
      let myData2 = [];
      $.ajax({
        url: "http://127.0.0.1:8000/api/" + slug + "/statisticsYears",
        type: "GET",
        dataType: 'json',
        success: function(data){
          newdata = data.map(
            element => {
              return element.toFixed(2);
          });
          chart2.data.datasets[0].data = newdata;
          chart2.update();
        }
});
     
    

      var chart2 = new Chart(year, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: {
            labels: myLabels2,
            datasets: [{
              label: '€',
              backgroundColor: '#a51b0b',
              /* borderColor: 'rgb(255, 99, 132)', */
              data: myData
            }]
          },

          // Configuration options go here
          options: {
            responsive:true,
            maintainAspectRatio:false,
            title: {
              display: true,
              text: 'Ordini per anno',
              fontSize: 25
            },
            layout:{
            padding:30,
            }
          }
        });
    </script>
@endsection