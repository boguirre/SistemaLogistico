
<div class="row">
    <div class=" col-md-6">
        {{-- <div class="form-group"> --}}
            <label for="suplier_id">Proveedor</label>
            <select class="form-control" name="suplier_id" id="suplier_id" style="color: white">
                @foreach ($providers as $provider)
                <option value="{{$provider->id}}" style="color: white">{{$provider->name}}</option>
                @endforeach
            </select>
        {{-- </div> --}}
        @error('suplier_id')
                <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="tax">Impuesto</label>
        <div class="input-group">

            <div class="input-group-prepend" style="width:41.39px; height: 48.5px" width="41.39px" height="48.5px">
                <span class="input-group-text" id="basic-addon3" style="width:41.39px; height: 48.5px">%</span>
            </div>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3"
                placeholder="18"  value="18">
        </div>
    </div>
</div>

{{-- <div class="form-group">
    <label for="code">Código de barras</label>
    <input type="text" name="code" id="code" class="form-control" placeholder="" aria-describedby="helpId">
</div> --}}
<br>
<div class="row">
    <div class="col-md-5">
        {{-- <div class="form-group"> --}}
            <label for="product_id">Producto</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="product_id" id="product_id" style="color: white">
                <option value="" disabled selected>Selecccione un producto</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        {{-- </div> --}}
        @error('product_id')
                <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror
    </div>
    <div class="col-md-3">
        {{-- <div class="form-group"> --}}
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
        {{-- </div> --}}
    </div>
    <div class="col-md-4">
        {{-- <div class="form-group"> --}}
            <label for="price">Precio de compra</label>
            <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId">
        {{-- </div> --}}
    </div>
</div>
<br>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary " style="float: right">Agregar producto</button>
</div>
<br>

<br>
<div class="form-group">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(PEN)</th>
                    <th>Cantidad</th>
                    <th>SubTotal(PEN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">PEN 0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
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