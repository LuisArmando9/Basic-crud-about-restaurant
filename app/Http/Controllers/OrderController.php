<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    const RULES =
    [
        "status" => ["required", "regex:/^CANCELLED|PENDIG|DELIVERED|^/"],
        "customerId" => ["required", "numeric"]

    ];
    const STATUS = ['PENDIG' => "Pendiente",'DELIVERED' =>"Entregado",'CANCELLED' => "Cancelado"];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $orders =  Order::join("customers", "customers.id", "=", "orders.customerId")
        ->select("customers.name", "orders.*")
        ->paginate(5);
       return view("order.index")
       ->with("orders", $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("order.create")
        ->with("customers", Customer::all("id", "name"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = self::RULES;
        unset($rules['status']);
        $request->validate($rules);
        $response = $request->all();
        DB::beginTransaction();
        try{
            $response["status"] = "PENDIG";
            Order::create($request->all());
            DB::commit();
        }catch(Exception){
            DB::rollBack();
            return back()->with("toast_error", "No se pudo registrar pedido, vuelvalo a intentar");
        }
        return redirect()->route("order.index")->with("toast_success", "Se registro el pedido");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view("order.edit")
        ->with("customers", Customer::where('id', "=",$order->customerId )->get(["id", "name"]))
        ->with("order", $order)
        ->with("status", self::STATUS);
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
        $request->validate(self::RULES);
        DB::beginTransaction();
        $order->update($request->except("_token"));
        try{
           $order->update($request->except("_token"));
            DB::commit();
        }catch(Exception){
            DB::rollBack();
            return back()->with("toast_error", "No se pudo actualizar pedido, vuelvalo a intentar");
        }
        return redirect()->route("order.index")->with("toast_success", "Se actualizo el pedido");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try{
            $order->delete();
        }catch(Exception){
            return back()->with("toast_error", "No se eliminar el pedido.");  
        }
        return redirect()->route("order.index")->with("toast_index", "Se elimino correctamente el pedido");

    }
}
