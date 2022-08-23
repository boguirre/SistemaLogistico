<br>
  <div class="row">

<div class="col-md-12">
    <label for="employee_id ">Empleado</label>
    <select class="form-control" name="employee_id " id="employee_id " style="color: white">
        <option value="" disabled selected>Selecccione un Empleado</option>
        @foreach ($employees as $employee)
        <option value="{{$employee->id}}">{{$employee->name}}</option>
        @endforeach
    </select>
    @error('employee_id')
        <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror 
</div>
</div>

{{-- <div class="form-group">
  <label for="code">Código de barras</label>
  <input type="text" name="code" id="code" class="form-control" placeholder="" aria-describedby="helpId">
</div> --}}

<br>
  <div class="row">
    <div class="col-md-4">
            <label for="product_id">Producto</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="product_id" id="product_id">
                @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
            @error('product_id')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror 
    </div>
    <div class="col-md-4">
            <label for="">Stock actual</label>
            <input type="text" name="" id="stock" value="" class="form-control" disabled>
    </div>
    <div class="col-md-4">
            <label for="price">Precio de venta</label>
            <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId">
    </div>
  </div>



<br>
  <div class="row">
    <div class="col-md-6">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
    </div>
    <div class=" col-md-3">
        <label for="tax">Impuesto</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3" value="18">
        </div>
    </div>
    <div class="col-md-3">
        <label for="discount">Porcentaje de descuento</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">%</span>
            </div>
            <input type="number" class="form-control" name="discount" id="discount" aria-describedby="basic-addon2" value="0">
        </div>
    </div>
  </div>






<br>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary" style="float:right">Agregar producto</button>
</div>
<br>
<div class="form-group">
    <h4 class="card-title">Detalles de Pedido</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio Venta (PEN)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>SubTotal (PEN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">PEN 0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL IMPUESTO (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">PEN 0.00</span> <input type="hidden"
                                name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
