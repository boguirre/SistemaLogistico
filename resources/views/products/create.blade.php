@extends('layouts.panel')

@section('content')

<div class="container">
       <div class="row">

    <h4 class="mt-5">Crear Producto</h4>
    {!! Form::open(['route' => 'products.store', 'autocomplete' => 'off', 'files' => true, 'class'=>'formulario row g-3']) !!}

    <div class="col-md-12">
        <label for="code" class="form-label">Codigo</label>
        <input type="code" class="form-control" id="code" name="code" style="color: white">
        @error('code')
            <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror 
    </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Proveedor</label>
            {!! Form::select('suplier_id', $suplier, null, ['class' => 'form-control  block w-full mt-1','style'=>'color:white', 'placeholder'=>'Seleccione Un Proveedor .....']) !!}
            @error('suplier_id')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror               
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Unidad de Medida</label>
            {!! Form::select('unit_measure_id', $measure, null, ['class' => 'form-control  block w-full mt-1','style'=>'color:white', 'placeholder'=>'Seleccione Una Unidad de Medida .....']) !!}
            @error('unit_measure_id')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror                    
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name">
            @error('name')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror 
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Categoria</label>
            {!! Form::select('category_id', $category, null, ['class' => 'form-control  block w-full mt-1','style'=>'color:white', 'placeholder'=>'Seleccione Una Categoria .....']) !!}
            @error('category_id')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror                   
        </div>
        
        <div class="col-md-6">
            <label for="stock" class="form-label">Stock</label>
            <input type="stock" class="form-control" id="stock" name="stock">
            @error('stock')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror 
        </div>
        

        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Guardar Información</button>
        </div>

    {!! Form::close() !!}

</div>
</div>

@endsection