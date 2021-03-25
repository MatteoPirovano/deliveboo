@extends('admin.layouts.main')

@section('aside')

@endsection

@section('main')
    {{-- <div class="statistics_restaurant_ms"> --}}

      <div class="container_charts" style="height: 1200px">

        <div class="container">
          
          <canvas id="myCanvas" class="mb-5">

          </canvas>
          <canvas id="year">

          </canvas>
        </div>
      </div>
    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      var ctx = document.getElementById('myCanvas').getContext('2d');
      let myLabels = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
      let myData = [];
      $.ajax({
        url: "http://127.0.0.1:8000/api/statistics",
        type: "GET",
        dataType: 'json',
        success: function(data){
          chart.data.datasets[0].data = data;
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
              label: 'Euro',
              backgroundColor: '#2f4f4f',
              /* borderColor: 'rgb(255, 99, 132)', */
              data: myData
            }]
          },

          // Configuration options go here
          options: {
            title: {
              display: true,
              text: 'Ordini per mese',
              fontSize: 25
            }
          }
        });
    </script>
    <script>
      var ctx2 = document.getElementById('year').getContext('2d');
      let myLabels2 = ['2020', '2021'];
      let myData2 = [];
      $.ajax({
        url: "http://127.0.0.1:8000/api/statisticsYears",
        type: "GET",
        dataType: 'json',
        success: function(data){
          chart2.data.datasets[0].data = data;
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
              label: 'Euro',
              backgroundColor: '#2f4f4f',
              /* borderColor: 'rgb(255, 99, 132)', */
              data: myData
            }]
          },

          // Configuration options go here
          options: {
            title: {
              display: true,
              text: 'Ordini per anno',
              fontSize: 25
            }
          }
        });
    </script>
@endsection