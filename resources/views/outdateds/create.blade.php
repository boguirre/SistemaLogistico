@extends('layouts.panel')

@section('content')

<div class="container">
       <div class="row">

    <h4 class="mt-5">Agregar Producto Obsoleto</h4>
    {!! Form::open(['route' => 'outdateds.store', 'autocomplete' => 'off', 'files' => true, 'class'=>'formulario row g-3']) !!}


    
    <div class="col-md-6">
        <label for="name" class="form-label">Producto</label>
        <select class="form-control" name="product_id" id="product_id" style="color: white" style="width: 100%">
            <option  value="" disabled selected>Selecccione un producto</option>
            @foreach ($products as $product)
            <option value="{{$product->id}}_{{$product->name}}_{{$product->stock}}_{{$product->total_quantity}}">{{$product->name}}</option>
            @endforeach
        </select>        @error('product_id')
            <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror                   
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" style="color: white" readonly>
        @error('stock')
            <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror   
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="quantity" name="quantity" style="color: white" readonly>
        @error('quantity')
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
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <link rel="stylesheet" href="{{asset('/path/to/select2.css')}}"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#product_id').select2({theme: "bootstrap4"  });
  </script>
<script>
    function mostrarValores() {
        datosProducto = document.getElementById('product_id').value.split('_');
        $("#quantity").val(datosProducto[3]);
        $("#stock").val(datosProducto[2]);
    };

    $("#product_id").on('change',mostrarValores);
    
    </script>
{{-- <script>
    $('.formulario').submit(function(e){
        e.preventDefault()
  
        Swal.fire({
          title: 'Estas seguro de guardar?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Guardar!',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.value) {
  
            
            this.submit()
            
          }
        })
  
    })
  
  </script>    --}}



@endsection