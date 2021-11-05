<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    const RULES =[
        "name" => "required|alpha_spaces",
        "email" => "required|email|unique:customers",
        "phone" => "required|numeric"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("customer.index")
        ->with("customers", Customer::paginate(5) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("customer.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(self::RULES);
        Customer::create($request->all());
        return redirect()->route("customer.index")->with("toast_success", "Se creo un nuevo cliente");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
    
        return view("customer.edit")
        ->with("customer", $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = self::RULES;
        if($request->has("email"))
        {
            if($customer->email == $request->all()['email']){
                unset($rules['email']);
            }
        }
        $request->validate($rules);
        $customer->update($request->except("_token"));
        return redirect()->route("customer.index")->with("toast_success", "Se actualizo correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try{
            $customer->delete();
        }catch(Exception $e){
            return redirect()->route("customer.index")->with("toast_error", "Error al eliminar el registro");
        }
        return redirect()->route("customer.index")->with("toast_success", "Error al eliminar el registro");
    }
}
