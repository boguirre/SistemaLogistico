<?php

namespace App\Http\Controllers;

use App\Models\Outdated;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutdatedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:outdated.index')->only('index');
        $this->middleware('can:outdated.edit')->only('edit', 'update');
        $this->middleware('can:outdated.create')->only('create', 'store');
        $this->middleware('can:outdated.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
       $mesActual = Carbon::now('America/Lima')->format('m');


        if ($request->has('año') | $request->has('mes')) {

            $outdateds = Outdated::whereMonth('date_outdated', $request->input('mes'))->whereYear('date_outdated',$request->input('año'))->get();
        } else {
            $outdateds = Outdated::whereMonth('date_outdated', $mesActual)->get();
        }
        return  view('outdateds.index', compact('outdateds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $products = Product::get();
        // $products = Product::join('damageds', 'products.id', '=', 'damageds.product_id')
        //     ->get();

        $currentMonth = Carbon::now('America/Lima')->month;


        /*$products = Product::join('damageds', 'products.id', '=', 'damageds.product_id')
            ->whereMonth('damageds.created_at', '=', $currentMonth)
            ->select('products.id', 'products.name', 'products.stock', DB::raw('SUM(damageds.quantity) as total_quantity'))
            ->groupBy('products.id', 'products.name', 'products.stock')
            ->get();*/


        /*$products = Product::join('damageds', 'products.id', '=', 'damageds.product_id')
                        ->leftJoin('outdateds', function ($join) use ($currentMonth) {
                            $join->on('products.id', '=', 'outdateds.product_id')
                                 ->whereMonth('outdateds.date_outdated', '=', $currentMonth);
                        })
                        ->whereMonth('damageds.date_damaged', '=', $currentMonth)
                        ->whereNull('outdateds.product_id')
                        ->where('damageds.status', '=', 'VALID')
                        ->select('products.id', 'products.name', 'products.stock', DB::raw('SUM(damageds.quantity) as total_quantity'))
                        ->groupBy('products.id', 'products.name', 'products.stock')
                        ->get();*/



        /*$products = Product::join('damageds', 'products.id', '=', 'damageds.product_id')
                                    ->leftJoin('outdateds', function ($join) use ($currentMonth) {
                                        $join->on('products.id', '=', 'outdateds.product_id')
                                             ->whereMonth('outdateds.created_at', '=', $currentMonth);
                                    })
                                    ->whereMonth('damageds.created_at', '=', $currentMonth)
                                    ->whereNull('outdateds.product_id')
                                    ->select('products.id', 'products.name', 'products.stock', DB::raw('SUM(damageds.quantity) as total_quantity'))
                                    ->groupBy('products.id', 'products.name', 'products.stock')
                                    ->havingRaw("MAX(damageds.status) = 'VALID'")
                                    ->get();*/

        $products = Product::join('damageds', 'products.id', '=', 'damageds.product_id')
            ->leftJoin('outdateds', function ($join) use ($currentMonth) {
                $join->on('products.id', '=', 'outdateds.product_id')
                    ->whereMonth('outdateds.created_at', '=', $currentMonth);
            })
            ->whereMonth('damageds.created_at', '=', $currentMonth)
            ->whereNull('outdateds.product_id')
            ->select('products.id', 'products.name', 'products.stock', DB::raw('(SELECT SUM(quantity) FROM damageds WHERE product_id = products.id AND status = "VALID") as total_quantity'))
            ->groupBy('products.id', 'products.name', 'products.stock')
            ->get();

        return view('outdateds.create', compact('products'));
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
        $productData = explode('_', $request->product_id);
        $productId = $productData[0];

        $outdated = Outdated::create([
            'product_id' => $productId,
            'quantity' => $request->quantity,
            'stock' => $request->stock,
            'date_outdated' => Carbon::now('America/Lima')
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
        $products = Product::pluck('name', 'id');

        return view('outdateds.edit', compact('outdated', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outdated $outdated)
    {

        $request->validate([
            'stock' => 'required',
            'quantity' => 'required',

        ]);

        $outdated->update($request->all());
        return redirect()->route('outdateds.index')->with('guardar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outdated $outdated)
    {
        $outdated->delete();

        return redirect()->route('outdateds.index')->with('guardar', 'ok');
    }
}
