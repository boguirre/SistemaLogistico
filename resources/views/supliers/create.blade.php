@extends('layouts.panel')

@section('content')

<div class="container">
       <div class="row">

    <h4 class="mt-5">Crear Proveedor</h4>
    {!! Form::open(['route' => 'supliers.store', 'autocomplete' => 'off', 'files' => true, 'class'=>'formulario row g-3']) !!}

    <div class="col-md-12">
        <label for="name" class="form-label">Razon Social:</label>
        <input type="name" class="form-control" id="name" name="name" style="color: white"> 
    </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Correo Electronico:</label>
            <input type="email" class="form-control" id="email" name="email"> 
        </div>
        <div class="col-md-6">
            <label for="ruc_number" class="form-label">RUC :</label>
            <input type="text" class="form-control" id="ruc_number" name="ruc_number"> 
        </div>
        <div class="col-md-6">
            <label for="address" class="form-label">Dirección:</label>
            <input type="address" class="form-control" id="address" name="address"> 
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Telefono / Celular :</label>
            <input type="text" class="form-control" id="phone" name="phone"> 
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Guardar Información</button>
        </div>

    {!! Form::close() !!}

</div>
</div>

@endsection