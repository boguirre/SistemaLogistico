<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Suplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        
        return view('purchases.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Suplier::get();
        $products = Product::get();

        return view('purchases.create',compact('providers','products'));
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
            'suplier_id' => 'required',
            'product_id' => 'required'     
        ]);
        $purchase = Purchase::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'date_purchase'=>Carbon::now('America/Lima'),
        ]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
        }
        $purchase->purchaseDetails()->createMany($results);

        return redirect()->route('purchases.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('purchases.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    public function reportpurchase(){


        $getyearmonth = Carbon::now('America/Lima')->format('Y-m');


        $orders= DB::select('call spcomprasmes(?)',array($getyearmonth));
        
        $data=[];
        foreach($orders as $order){
                 
               $data['label'][] = $order->estado;

               $data['data'][] = $order->cantidad;

        }

        $data['data'] = json_encode($data);

        return view('purchases.report.index',$data);
    }
}
