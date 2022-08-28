<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status','=','PENDIENTE')->get();
        
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        $employees = Employee::get();
        return view('orders.create',compact('products','employees'));
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
            'employee_id' => 'required',
            'product_id' => 'required',
            'date_order_delivery'=>'required|date'          
        ]);

        $order = Order::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'date_order'=>Carbon::now('America/Lima'),
        ]);
        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
        }
        $order->orderDetails()->createMany($results);
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $subtotal = 0 ;
        $orderDetails = $order->orderDetails;
        foreach ($orderDetails as $orderDetail) {
            $subtotal += $orderDetail->quantity*$orderDetail->price;
        }

        return view('orders.show', compact('order', 'orderDetails', 'subtotal'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function culminated(){



        $orders =Order::where('status','=','ENTREGADO')->get();

        return view('orders.culminated.index',compact('orders'));
    }

    public function ordercompleted(Order $order){

        if($order->date_order_delivery < Carbon::now()->format('Y-m-d')){
            $order->update(['statusend'=>'COMPLETO','status'=>'ENTREGADO','status_delivery'=>'DESTIEMPO']);
        }
        else {
            $order->update(['statusend'=>'COMPLETO','status'=>'ENTREGADO','status_delivery'=>'TIEMPO']);
        }

        return redirect()->route('orders.index')->with('editar', 'ok');

    }

    public function orderincompleted(Order $order){

        if($order->date_order_delivery < Carbon::now()->format('Y-m-d')){
            $order->update(['statusend'=>'INCOMPLETO','status'=>'ENTREGADO','status_delivery'=>'DESTIEMPO']);
        }
        // $order->update(['status'=>'INCOMPLETO','status'=>'ENTREGADO']);
        else{
            $order->update(['statusend'=>'INCOMPLETO','status'=>'ENTREGADO','status_delivery'=>'TIEMPO']);
        }

        return redirect()->route('orders.index')->with('editar', 'ok');
    }




}
