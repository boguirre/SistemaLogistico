@extends('layouts.panel')

@section('content')
<div class="middle-content container-xxl p-0">

    <!-- BREADCRUMB -->
    <div class="page-meta">
        {{-- <div class="col text-right"> --}}
            <a href="{{url('/orders/create')}}" class="btn btn-xm btn-primary" style="float: right;">Crear Pedido</a>
            {{--
        </div> --}}
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tabla</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pedidos Entregados</li>
            </ol>
        </nav>


    </div>


    <!-- /BREADCRUMB -->

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th class="text-center dt-no-sorting">Estado</th>
                            <th class="text-center dt-no-sorting">Conformidad</th>

                            <th class="text-center dt-no-sorting">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <div class="usr-img-frame me-2 rounded-circle">
                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{asset('src/assets/img/boy.png')}}">
                                    </div>
                                    <p class="align-self-center mb-0 admin-name"> {{$order->id}} </p>
                                </div>
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($order->date_order)->format('d M y h:i a')}}
                            </td>
                            <td>{{$order->total}}</td>
                            <td>
                                @switch($order->status)
                                @case('PENDIENTE')
                                <span class="display badge badge-light-warning inv-status " style="display: block">PENDIENTE</span>

                                @break
                                @case('ENTREGADO')
                                <span class="display badge badge-light-success inv-status" style="display: block">ENTREGADO</span>

                                @break

                                @default
                                @endswitch
                            </td>
                            <td>
                                @switch($order->statusend)
                                @case('COMPLETO')
                                <span class="text-center badge badge-light-warning inv-status" style="display: block">COMPLETO</span>

                                @break
                                @case('INCOMPLETO')
                                <span class="display badge badge-light-success inv-status">INCOMPLETO</span>

                                @break

                                @default
                                @endswitch
                            </td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    {{-- <form action="{{route('orders.destroy', $order)}}" method="POST" class="casino">
                                        @csrf
                                        @method('DELETE') --}}
                                        {{-- <a href="{{route('orders.edit',$order)}}" class="bs-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                            data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg></a> --}}
                                        <a href="{{route('orders.show',$order)}}" class="bs-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Ver"
                                            data-original-title="Ver">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>

                                        </a>
                                        <a href="{{route('orders.pdf',$order)}}" class="text-danger font-weight-bold text-xl" title="PDF" data-toggle="tooltip" data-original-title="PDF">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                          
                                        </a>
                                        {{-- <button type="submit" class="" style="background-color: none"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash p-1 br-8 mb-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                            </svg></button>

                                    </form>
                                </ul> --}}
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