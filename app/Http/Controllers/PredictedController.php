<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class PredictedController extends Controller
{
    public function index(){

        $response = Http::post('http://127.0.0.1:5000/katana-ml/api/v1.0/forecast/ironsteel', [
            'horizon' => '12',
        ]);

        return view('predicted.index', compact('response'));
    }

    public function create(){
        return view('predicted.create');
    }

    public function predicted(Request $request){
        $response = Http::post('http://127.0.0.1:5000/katana-ml/api/v1.0/forecast/ironsteel', [
            'horizon' => $request->number,
        ]);

        return view('predicted.index', compact('response'));

    }
}
