<?php

namespace App\Http\Controllers;

use App\Models\Outdated;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OutdatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outdateds = Outdated::all();

        return  view('outdateds.index',compact('outdateds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        return view('outdateds.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'stock' => 'required',
            'quantity' => 'required',
            
        ]);

        $outdated = Outdated::create($request->all()+[
            'date_outdated'=> Carbon::now()
        ]);

        return redirect()->route('outdateds.index')->with('guardar', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Outdated $outdated)
    {
        $products = Product::pluck('name','id');

        return view('outdateds.edit',compact('outdated','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Outdated $outdated)
    {
        $outdated->delete();

        return redirect()->route('outdateds.index')->with('guardar', 'ok');
    }
}
