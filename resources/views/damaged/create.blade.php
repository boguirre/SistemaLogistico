@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="row">

            <h4 class="mt-5">Registrar Producto Dañado</h4>
            {!! Form::open([
                'route' => 'damageds.store',
                'autocomplete' => 'off',
                'files' => true,
                'class' => 'formulario row g-3',
            ]) !!}
            <div class="col-md-6">
                <label for="name" class="form-label">Producto</label>
                <select class="form-control" name="product_id" id="product_id" style="color: white;width: 100%" required>
                    <option value="" disabled selected>Selecccione un producto</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}_{{ $product->stock }}">{{ $product->name }}</option>
                    @endforeach
                </select> @error('product_id')
                    <strong class="text-sm text-red-600">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Stock Actual</label>
                <input type="number" class="form-control" id="stock" name="" style="color: white" readonly>
                @error('stock')
                    <strong class="text-sm text-red-600">{{ $message }}</strong>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="name" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="quantity" name="quantity" style="color: white"
                    min="1" required>
                @error('quantity')
                    <strong class="text-sm text-red-600">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" id="guardar" class="btn btn-primary" style="float: right;">Guardar
                    Información</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <link rel="stylesheet" href="{{asset('/path/to/select2.css')}}"> --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#product_id').select2({
            theme: "bootstrap4"
        });
    </script>
    {{-- <script>
        function mostrarValores() {
            datosProducto = document.getElementById('product_id').value.split('_');
            // $("#price").val(datosProducto[2]);
            $("#stock").val(datosProducto[1]);
        };

        $("#product_id").on('change', mostrarValores);
    </script> --}}

    {{-- <script>
        function mostrarValores() {
            datosProducto = document.getElementById('product_id').value.split('_');
            $("#stock").val(datosProducto[1]);
            // Verificar si el stock es cero
            if (datosProducto[1] == 0) {
                $("#guardar").hide(); // Ocultar el botón guardar si el stock es cero
            } else {
                $("#guardar").show(); // Mostrar el botón guardar si el stock es mayor a cero
            }
        };
    
        $("#product_id").on('change', mostrarValores);
    
        $("#quantity").on('input', function() {
            var stock = parseInt($("#stock").val());
            var quantity = parseInt($(this).val());
    
            if (quantity > stock) {
                $("#guardar").hide(); // Ocultar el botón guardar si la cantidad es mayor al stock
            } else {
                $("#guardar").show(); // Mostrar el botón guardar si la cantidad es menor o igual al stock
            }
        });
    </script> --}}


    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("#guardar").hide(); // Ocultar el botón guardar al cargar la página
        });

        function mostrarValores() {
            datosProducto = document.getElementById('product_id').value.split('_');
            $("#stock").val(datosProducto[1]);
            $("#quantity").val('');
            // Verificar si el stock es cero
            if (datosProducto[1] == 0) {
                $("#guardar").hide(); // Ocultar el botón guardar si el stock es cero
            } else {
                $("#guardar").show(); // Mostrar el botón guardar si el stock es mayor a cero
            }
        };

        $("#product_id").on('change', mostrarValores);

        $("#quantity").on('input', function() {
            var stock = parseInt($("#stock").val());
            var quantity = parseInt($(this).val());

            if (quantity > stock) {
                $("#guardar").hide(); // Ocultar el botón guardar si la cantidad es mayor al stock
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 6000,
                    timerProgressBar: true,

                })
                Toast.fire({
                    icon: 'error',
                    title: 'No puede exceder el stock!!!'
                });

            } else {
                $("#guardar").show(); // Mostrar el botón guardar si la cantidad es menor o igual al stock
            }
        });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("#guardar").hide(); // Ocultar el botón guardar al cargar la página
            updateSubmitButton(); // Actualizar tipo de botón al cargar la página
        });

        function mostrarValores() {
            datosProducto = document.getElementById('product_id').value.split('_');
            $("#stock").val(datosProducto[1]);
            $("#quantity").val('');

            // Verificar si el stock es cero
            if (datosProducto[1] == 0) {
                $("#guardar").hide(); // Ocultar el botón guardar si el stock es cero
            } else {
                $("#guardar").show(); // Mostrar el botón guardar si el stock es mayor a cero
            }

            updateSubmitButton(); // Actualizar tipo de botón después de mostrar/ocultar
        };

        function updateSubmitButton() {
            var stock = parseInt($("#stock").val());
            var quantity = parseInt($("#quantity").val());
            var submitButton = $("#guardar");

            if (quantity > stock || stock == 0) {
                submitButton.attr("type", "button"); // Cambiar el tipo a button si no se cumplen las condiciones
            } else {
                submitButton.attr("type", "submit"); // Mantener el tipo como submit si se cumplen las condiciones
            }
        }

        $("#product_id").on('change', mostrarValores);

        $("#quantity").on('input', function() {
            var stock = parseInt($("#stock").val());
            var quantity = parseInt($(this).val());

            if (quantity > stock) {
                $("#guardar").hide(); // Ocultar el botón guardar si la cantidad es mayor al stock

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 6000,
                    timerProgressBar: true,
                });

                Toast.fire({
                    icon: 'error',
                    title: '¡No puede exceder el stock!'
                });
            } else {
                $("#guardar").show(); // Mostrar el botón guardar si la cantidad es menor o igual al stock
            }

            updateSubmitButton(); // Actualizar tipo de botón después de ingresar la cantidad
        });
    </script>

    <script>
        $('.formulario').submit(function(e) {
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
    </script>
@endsection
