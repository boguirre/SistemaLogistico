<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>TOTAL DE PEDIDOS COMPLETOS</th>
            <th>TOTAL DE PEDIDOS INCOMPLETOS</th>
            <th>TOTAL DE PEDIDOS</th>
            <th>%</th>

        </tr>
    </thead>
    <tbody>
        @foreach($completo as $completos)
        <tr>
            <td>{{$completos->TIEMPO}}</td>
            <td>{{$completos->COMPLETO}}</td>
            <td>{{$completos->INCOMPLETO}}</td>
            <td>{{$completos->TOTALPEDIDOS}}</td>
            <td>{{$completos->COMPLETO / $completos->TOTALPEDIDOS}}</td>


        </tr>
        @endforeach
    </tbody>
</table>