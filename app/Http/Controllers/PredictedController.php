<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PredictedController extends Controller
{
    public function index(){
        return view('predicted.index');
    }

    public function predictedcompleted(){
        return view('predicted.completed.index');
    }

    public function predictedtime(){
        return view('predicted.time.index');

    }
}
