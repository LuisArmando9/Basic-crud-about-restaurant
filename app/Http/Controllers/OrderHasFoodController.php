<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Food;
use App\Models\Order;
use App\Models\Order_Has_Food;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderHasFoodController extends Controller
{

    const RULES = [
        "orderId" => "required|exists:orders,id"
    ];
    const INPUT_NAME = "food";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getRules($response){
        $newRules = self::RULES;

        foreach($response as $key => $content){
            $inputName = "food{$content}";
            if(is_numeric($content) && strtolower($key) === $inputName){
                $newRules[$inputName] = "required|exists:food,id";
            }
        }
        return $newRules;

    }
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
    private function insert($response){
        $orderId = $response["orderId"];
        $tempData = array();
        foreach($response as $foodId){
            array_push($tempData, array(
                "orderId" => $orderId,
                "foodId" => $foodId,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ));
        }
        DB::beginTransaction();
        try{
            DB::table("order_has_food")->insert($tempData);
            DB::commit();
        }catch(Exception){
            DB::rollBack();
            return back()->with("toast_error", "No se pudieron asignar los platillos");
        }
        return back()->with("toast_success", "Se asignaron los platillos correctamente");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    
        Alert::success('Congrats', 'You\'ve Successfully Registered');
        $response = $request->except(["foodId", "_token"]);
       /* $response = $request->except(["foodId", "_token"]);
        if(empty($response)){
            return redirect()->route("orderhasfood.index")->with("toast_error", "No contienes ningun registro");
        }
        /**
         * validate if the new rules contains only the orderId, if this way  return error because it is not  contains records for
         * store 
         */
        /*$newRules = $this->getRules($response);
        if(count($newRules) <= 1){
            return redirect()->route("orderhasfood.index")->with("toast_error", "No contienes ningun platillo.");            
        }
        $validator = Validator::make($response, $newRules);
        if($validator->fails()){
            return redirect()->route("orderhasfood.index")->with("toast_error", "Error al insertar los datos");
        }*/
        return $this->insert($response);
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
