@extends('layouts.panel')

@section('content')

<div class="container">
       <div class="row">

    <h4 class="mt-5">Crear Unidad de medida</h4>
    {!! Form::open(['route' => 'measures.store', 'autocomplete' => 'off', 'files' => true, 'class'=>'formulario row g-3']) !!}

        <div class="col-md-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name"> 
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Crear Unidad de Medida</button>
        </div>
    {!! Form::close() !!}

</div>
</div>

@endsection