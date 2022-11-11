@extends('layouts.panel')


@section('content')

<div class="row layout-top-spacing">

{{-- @foreach ($response->json() as $item)
    <div>{{ $item['ds'] }}</div>
@endforeach --}}

<div class="row layout-top-spacing">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>DS</th>
                        <th>YHAT</th>
                        <th>YHAT_LOWER</th>
                        <th>YHAT_UPPER</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($response->json() as $item)
                    <tr>
                        <td>
                            {{-- {{$item['ds']}} --}}
                            {{\Carbon\Carbon::parse($item['ds'])->format('Y-m-d')}}
                        </td>
                        <td>
                            
                            {{$item['yhat']}}
                        </td>
                        <td>{{$item['yhat_lower']}}</td>
                        <td>
                            {{$item['yhat_upper']}}
                        </td>
                    </tr>

                    @endforeach


                </tbody>

            </table>
        </div>
    </div>

</div>



@endsection

@section('scripts')

@endsection