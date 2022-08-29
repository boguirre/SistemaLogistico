@extends('layouts.panel')

@section('content')
<div class="row layout-top-spacing">

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
</div>
<script src="../src/plugins/src/apex/apexcharts.min.js"></script>

@endsection