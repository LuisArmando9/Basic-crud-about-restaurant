<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Food;
use App\Models\Order;
use App\Models\Order_Has_Food;
use Illuminate\Http\Request;

class OrderHasFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->has('order') || !is_numeric( $request->get('order'))){
            return back();
        }
        $order = Order::findOrfail($request->get('order'));
        $customer = Customer::where("id", $order->customerId)->first();
        return view("orderhasfood.index")
        ->with("order",  $order)
        ->with("customer", $customer)
        ->with("foods", Food::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_Has_Food  $order_Has_Food
     * @return \Illuminate\Http\Response
     */
    public function show(Order_Has_Food $order_Has_Food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_Has_Food  $order_Has_Food
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_Has_Food $order_Has_Food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_Has_Food  $order_Has_Food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_Has_Food $order_Has_Food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_Has_Food  $order_Has_Food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_Has_Food $order_Has_Food)
    {
        //
    }
}
