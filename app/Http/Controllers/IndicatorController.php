<?php

namespace App\Http\Controllers;

use App\Exports\PedidosCompletosExport;
use App\Exports\PedidosTiempoExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Outdated;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class IndicatorController extends Controller
{
    public function index()
    {
        $outdateds= DB::select('call spobsoleto');
        return view('indicators.obsolecencia.index',compact('outdateds'));
    }
    
    public function pedidosTiempo(){

        $tiempo =  DB::select('call sppedidostiempo');

        return view('indicators.ped_tiempo.index',compact('tiempo'));
    }
    public function pedidosCompletos(){
        $completo =  DB::select('call sppedidoscompleto');

        return view('indicators.ped_completos.index',compact('completo'));
    }

    

    public function exportAllPediCompletos(){
        return Excel::download(new PedidosCompletosExport, 'pedidostiempo.csv',\Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
      ] );
    
    }
    public function exportAllPediTiempo(){
        return Excel::download(new PedidosTiempoExport, 'pedidostiempo.xlsx' );
    
    }

}
