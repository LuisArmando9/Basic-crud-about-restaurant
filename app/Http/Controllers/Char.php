<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Has_Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * https://stackoverflow.com/questions/40917189/laravel-syntax-error-or-access-violation-1055-error
 */

class Char extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function getRepeatHours(){
    
        $hours = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        foreach(Order::get(["created_at"]) as $order){
            $hour = (int)date("H", strtotime($order->created_at));
            $hours[$hour]++;
        }
        return $hours;



    }
    public function index()
    {
        $foods = DB::table('order_has_food')
        ->join("food", "order_has_food.foodId", "=", "food.id")
        ->select( "food.name", DB::raw('count(foodId) as  count'))
        ->groupBy("foodId")
        ->orderByDesc("count")
        ->skip(0)
        ->take(5)
        ->get();
        $status =  DB::table('orders')
        ->select(DB::raw('count(status) as  count, status'))
        ->groupBy("status")
        ->get();
        $orders = Order::get()->count();
        $data = array( 
            "orders" => $orders,
            "customers" => Customer::get()->count(),
            "foods" => array($foods, "count" => Order_Has_Food::get()->count()),
            "status" =>array($status),
            "hours" => $this->getRepeatHours());  
        return response()->json( $data);
        return $this->getRepeatHours();

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
