@extends('layouts.panel')

@section('content')
{{-- <div class="row layout-top-spacing">

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

    <div class="card"> 
        <div class="card-body"> 

    <div class="widget widget-chart-two">
        <div class="widget-heading">
            <h5 class="">Sales by Category</h5>
        </div>
        <div class="widget-content">
            <div id="" class="">
                <canvas id="myChart" width="400" height="400"></canvas>

            </div>
        </div>
    </div>
      </div>

      

     </div>

     
</div>
</div> --}}
<br>
<br>
<div class="page-header">
    <h3 class="page-title">

    </h3>
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel administrador</a></li> <li class="breadcrumb-item"><a href="#">Asistencia</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mis Asistencias</li>
        </ol>
    </nav> --}}

    <div class="row">




      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.25rem solid #3d9970!important">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xm font-weight-bold text-uppercase mb-1" style="color: #4C5755">
                            Total de Compras</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x " style="color:white!important"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>
                </div>
            </div>
        </div>
     </div>


    
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.25rem solid #3d9970!important">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-uppercase mb-1" style="color: #4C5755">
                          Compras del Mes</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800"></div>
                  </div>
                  <div class="col-auto">

                    <i class="fas fa-calendar-times fa-2x " style="color:#3d9970"></i>
                  </div>
              </div>
          </div>
      </div>
    </div>



    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.25rem solid #3d9970!important">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-uppercase mb-1" style="color: #4C5755">
                        Puntualidades</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800"></div>
                  </div>
                  <div class="col-auto">

                    <i class="fas fa-clock fa-2x " style="color:#3d9970"></i>
                  </div>
              </div>
          </div>
      </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.25rem solid #3d9970!important">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-uppercase mb-1" style="color: #4C5755">
                        Feriados Del Mes</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800"></div>
                  </div>
                  <div class="col-auto">

                    <i class="fas fa-address-book	 fa-2x " style="color:#3d9970"></i>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

 <div class="row">
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold" style="color: #4C5755">Asistencias Del Años Por Mes</h6>
            
        </div>
        <div class="card-body">
            <div class="chart-area pt-4 pb-2">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
   </div>



<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold" style="color: #4C5755">Asistencia y Tardanzas por mes</h6>
          
      </div>
      <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
              <canvas id="mychartardies"></canvas>
          </div>
          <br>
      </div>
  </div>
</div>


</div>
</div>


@endsection

@section('scripts')

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


@endsection