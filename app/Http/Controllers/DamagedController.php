<?php

namespace App\Http\Controllers;

use App\Models\Damaged;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DamagedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:outdated.index')->only('index');
        $this->middleware('can:outdated.edit')->only('edit', 'update');
        $this->middleware('can:outdated.create')->only('create', 'store');
        $this->middleware('can:outdated.destroy')->only('destroy');
    }

    public function index()
    {
        $damageds = Damaged::get();

        return view('damaged.index', compact('damageds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();

        return view('damaged.create', compact('products'));
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
            'quantity' => 'required',

        ]);
        $productData = explode('_', $request->product_id);
        $productId = $productData[0];


        // return $productData[1];


        $damaged = Damaged::create([
            'product_id' => $productId,
            'quantity' => $request->quantity,
            'date_damaged' => Carbon::now('America/Lima')
        ]);


        return redirect()->route('damageds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Damaged  $damaged
     * @return \Illuminate\Http\Response
     */
    public function show(Damaged $damaged)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Damaged  $damaged
     * @return \Illuminate\Http\Response
     */
    public function edit(Damaged $damaged)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Damaged  $damaged
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Damaged $damaged)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Damaged  $damaged
     * @return \Illuminate\Http\Response
     */
    public function destroy(Damaged $damaged)
    {
        $damaged->status = 'CANCELED';
        $damaged->save();
        return redirect()->route('damageds.index');
    }

    public function cambio_estado(Damaged $damaged)
    {
        $damaged->status = 'VALID';
        $damaged->save();

        return redirect()->route('damageds.index');
    }
}
