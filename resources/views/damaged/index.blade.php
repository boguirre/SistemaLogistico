@extends('layouts.panel')

@section('content')
    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            {{-- <div class="col text-right"> --}}
            <a href="{{ route('damageds.create') }}" class="btn btn-xm btn-primary" style="float: right;">Registrar Productos
                Dañados
            </a>
            {{-- </div> --}}
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tabla</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productos Dañados</li>
                </ol>
            </nav>


        </div>

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Producto</th>
                                {{-- <th>Stock</th> --}}
                                <th>Categoria</th>
                                <th>Cantidad</th>
                                <th class="text-center dt-no-sorting">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($damageds as $damaged)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame me-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle"
                                                    src="src/assets/img/boy.png">
                                            </div>
                                            <p class="align-self-center mb-0 admin-name"> {{ $damaged->id }} </p>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($damaged->date_damaged)->format('Y-m-d') }}</td>
                                    <td> {{ Str::limit($damaged->product->name, 100) }}</td>
                                    {{-- <td>{{ $damaged->stock }}</td> --}}
                                    <td>{{ $damaged->product->categories->name }}</td>
                                    <td>{{ $damaged->quantity }}</td>

                                    <td class="text-center">
                                            @if ($damaged->status == 'VALID')


                                              @if ($damaged->quantity <= $damaged->product->stock)
                                              <ul class="table-controls">
                                                <form action="{{ route('damageds.destroy', $damaged) }}" method="POST"
                                                    class="desactivar">
                                                    @csrf
                                                    @method('DELETE')
                                                    

                                                    <button type="submit" class="btn btn-success" style="">
                                                        {{-- <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash p-1 br-8 mb-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                        </svg> --}}
                                                        CANCELAR
                                                    </button>

                                                </form>



                                              </ul>
                                                
                                               @else
                                                
                                               @endif


                                            
                                            @else
                                             <ul class="table-controls">
                                                <form action="{{ route('damageds.estado', $damaged) }}" method="POST"
                                                    class="activar">
                                                    @csrf
                                                    @method('DELETE')
                                                  
                                                    <button type="submit" class="btn btn-danger" style="">
                                                        
                                                      ACTIVAR
                                                    </button>

                                                </form>
                                             </ul>
                                            @endif
                                        
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


@section('scripts')
<script>
    $('.activar').submit(function(e){
        e.preventDefault()
  
        Swal.fire({
          title: 'Estas seguro de Habilitar?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Habilitar!',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.value) {
  
            
            this.submit()
            
          }
        })
  
    })
  
  </script>  

<script>
    $('.desactivar').submit(function(e){
        e.preventDefault()
  
        Swal.fire({
          title: 'Estas seguro de Deshabilitar?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Deshabilitar!',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.value) {
  
            
            this.submit()
            
          }
        })
  
    })
  
  </script> 
@endsection
