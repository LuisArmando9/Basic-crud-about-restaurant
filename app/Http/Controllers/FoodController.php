<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Exception;
use Illuminate\Http\Request;
class FoodController extends Controller
{
    const RULES = [
        "name" => "required|alpha_spaces",
        "price" => "required|numeric|gt:0",
        "description" => "required|alpha_spaces"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("food.index")
        ->with("foods", Food::paginate(4));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("food.create");
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
        Food::create($request->except("_token"));
        return redirect()->route("food.index")->with("toast_success", "Se ha creado u nuevo platillo");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view("food.edit")
        ->with("food", $food);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        try{
            $request->validate(self::RULES);
            $food->update($request->except['_token']);
            return redirect()->route("food.index")->with("toast_success", "Se ha actualizado el  platillo");
        }catch(Exception){
            return redirect()->route("food.index")->with("toast_error", "No se puede actualizar el platillo");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        try{
            $food->delete();
            return redirect()->route("food.index")->with("toast_success", "Se ha eliminado el platillo");
        }catch(Exception){
            return redirect()->route("food.index")->with("toast_error", "No se puedo eliminar el platillo");
        }
    }
}
