<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class PredictedController extends Controller
{
    public function index()
    {
        ini_set('max_execution_time', 0);

        try {
            $response = Http::timeout(60)->post('https://model-bond.onrender.com/katana-ml/api/v1.0/forecast/ironsteel', [
                'horizon' => '6',
            ]);

            // Verificar si hay errores en la respuesta
            if ($response->failed()) {
                // Manejar el error de la respuesta
            }

            return view('predicted.index', compact('response'));
        } catch (\Exception $e) {
            // Manejar el error de tiempo de espera
            return view('predicted.index', compact('response'));
        }
    }

    public function create()
    {
        return view('predicted.create');
    }

    public function predicted(Request $request)
    {
        ini_set('max_execution_time', 0);

        try {
            $response = Http::timeout(60)->post('https://model-bond.onrender.com/katana-ml/api/v1.0/forecast/ironsteel', [
                'horizon' => $request->number,
            ]);

            // Verificar si hay errores en la respuesta
            if ($response->failed()) {
                // Manejar el error de la respuesta
            }

            return view('predicted.index', compact('response'));
        } catch (\Exception $e) {
            // Manejar el error de tiempo de espera
        }
    }

    public function oficeIndex(Request $request)
    {

        ini_set('max_execution_time', 0);

        try {
            $response = Http::timeout(60)->post('https://model-oficina-icte.onrender.com/katana-ml/api/v1.0/forecast/ironsteel', [
                'horizon' => '6',
            ]);

            // Verificar si hay errores en la respuesta
            if ($response->failed()) {
                // Manejar el error de la respuesta
            }

            return view('predicted.ofice.index', compact('response'));
        } catch (\Exception $e) {
            // Manejar el error de tiempo de espera
            return view('predicted.ofice.index', compact('response'));
        }
    }

    public function createOfice()
    {
        return view('predicted.ofice.create');
    }


    

    public function predictedOfice(Request $request)
    {
        try {
            $response = Http::timeout(60)->post('https://model-oficina-icte.onrender.com/katana-ml/api/v1.0/forecast/ironsteel', [
                'horizon' => $request->number,
            ]);

            // Verificar si hay errores en la respuesta
            if ($response->failed()) {
                // Manejar el error de la respuesta
            }

            return view('predicted.ofice.index', compact('response'));
        } catch (\Exception $e) {
            // Manejar el error de tiempo de espera
        }
    }

    public function cleanIndex()
    {
        ini_set('max_execution_time', 0);

        try {
            $response = Http::timeout(60)->post('https://model-aseo-icte.onrender.com/katana-ml/api/v1.0/forecast/ironsteel', [
                'horizon' => '3',
            ]);

            // Verificar si hay errores en la respuesta
            if ($response->failed()) {
                // Manejar el error de la respuesta
            }

            return view('predicted.clean.index', compact('response'));
        } catch (\Exception $e) {
            // Manejar el error de tiempo de espera
        }
    }

    public function createClean()
    {
        return view('predicted.clean.create');
    }
    public function predictedClean(Request $request)
    {
        try {
            $response = Http::timeout(60)->post('https://model-aseo-icte.onrender.com/katana-ml/api/v1.0/forecast/ironsteel', [
                'horizon' => $request->number,
            ]);

            // Verificar si hay errores en la respuesta
            if ($response->failed()) {
                // Manejar el error de la respuesta
            }

            return view('predicted.clean.index', compact('response'));
        } catch (\Exception $e) {
            // Manejar el error de tiempo de espera
        }
    }
}
