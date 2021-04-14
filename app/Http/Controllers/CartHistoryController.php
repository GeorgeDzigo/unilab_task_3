<?php

namespace App\Http\Controllers;

use App\Models\CartHistory;
use Illuminate\Http\Request;

class CartHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\CartHistory  $cartHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CartHistory $cartHistory)
    {

        return view("cart.history.history",[
            "products" => $cartHistory->where("user_id", auth()->id())->get(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartHistory  $cartHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(CartHistory $cartHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartHistory  $cartHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartHistory $cartHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartHistory  $cartHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartHistory $cartHistory)
    {
        //
    }
}
