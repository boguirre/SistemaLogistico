<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>TOTAL DE PEDIDOS A TIEMPO</th>
            <th>TOTAL DE PEDIDOS A DESTIEMPO</th>
            <th>TOTAL DE PEDIDOS</th>
            <th>%</th>

        </tr>
    </thead>
    <tbody>
        @foreach($tiempo as $tiempos)
        <tr>
            <td>{{$tiempos->TIEMPO}}</td>
            <td>{{$tiempos->TEMPRANO}}</td>
            <td>{{$tiempos->DESTIEMPO}}</td>
            <td>{{$tiempos->TOTALPEDIDOS}}</td>
            <td>{{$tiempos->TEMPRANO / $tiempos->TOTALPEDIDOS}}</td>


        </tr>
        @endforeach
    </tbody>
</table>