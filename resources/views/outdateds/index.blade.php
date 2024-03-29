@extends('layouts.panel')

@section('content')
    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            {{-- <div class="col text-right"> --}}
            <a href="{{ url('/outdateds/create') }}" class="btn btn-xm btn-primary" style="float: right;">Agregar Productos
                Obsoletos</a>
            {{-- </div> --}}
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tabla</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Obsoletos</li>
                </ol>
            </nav>


        </div>

        <div class="row layout-top-spacing">
            <div class="col-md-12">

                <form>
                    <div class="row">
                        <div class="col-md-3">

                            <label for="mes" class="form-label">Mes:</label>
                            <select class="form-control" name="mes" id="mes" style="color: white" required>
                                <option value="" disabled selected>Selecccione un mes</option>
                                <option value="1"> Enero</option>
                                <option value="2"> Febrero </option>
                                <option value="3"> Marzo </option>
                                <option value="4"> Abril </option>
                                <option value="5"> Mayo</option>
                                <option value="6"> Junio</option>
                                <option value="7"> Julio</option>
                                <option value="8"> Agosto</option>
                                <option value="9"> Setiembre</option>
                                <option value="10"> Octubre</option>
                                <option value="11"> Noviembre</option>
                                <option value="12"> Diciembre</option>

                            </select>
                            @error('mes')
                                <strong class="text-sm text-red-600">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="año" class="form-label">Año:</label>
                            <select class="form-control" name="año" id="año" style="color: white" required>
                                <option value="" disabled selected>Selecccione un Año</option>
                                <option value="2023" selected> 2023</option>


                            </select>
                            @error('mes')
                                <strong class="text-sm text-red-600">{{ $message }}</strong>
                            @enderror

                        </div>

                        <div class="col-md-3">


                            <button class="btn btn-success mt-4" type="submit"> Consultar</button>

                        </div>
                    </div>
                </form>

            </div>
            <br>

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <br>
                <div class="widget-content widget-content-area br-8">
                    <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Producto</th>
                                <th>Stock</th>
                                <th>Categoria</th>
                                <th>Cantidad</th>
                                <th class="text-center dt-no-sorting">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outdateds as $outdated)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame me-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle"
                                                    src="src/assets/img/boy.png">
                                            </div>
                                            <p class="align-self-center mb-0 admin-name"> {{ $outdated->id }} </p>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($outdated->date_outdated)->format('Y-m-d') }}</td>
                                    <td> {{ Str::limit($outdated->product->name, 100) }}</td>
                                    <td>{{ $outdated->stock }}</td>
                                    <td>{{ $outdated->product->categories->name }}</td>
                                    <td>{{ $outdated->quantity }}</td>

                                    <td class="text-center">
                                        <ul class="table-controls">

                                            @php
                                                $fechaOutdated = \Carbon\Carbon::parse($outdated->date_outdated)->addDays(2);
                                                $fechaActual = \Carbon\Carbon::now('America/Lima');
                                            @endphp

                                            @if ($fechaOutdated->format('Y-m-d') > $fechaActual->format('Y-m-d'))
                                                
                                            
                                            
                                            
                                            <form action="{{ route('outdateds.destroy', $outdated) }}" method="POST"
                                                    class="casino">
                                                    @csrf
                                                    @method('DELETE')


                                                    {{-- <a href="{{ route('outdateds.edit', $outdated) }}" class="bs-tooltip"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                                        data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-edit-2 p-1 br-8 mb-1">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg></a> --}}




                                                    <button type="submit" class=""
                                                        style="background-color: none"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash p-1 br-8 mb-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                        </svg></button>

                                                </form>
                                            @else

                                            @endif








                                        </ul>
                                    </td>



                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
