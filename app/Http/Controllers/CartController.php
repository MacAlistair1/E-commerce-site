<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        $duplicate = Cart::where(['product_id'=> $request->product, 'user_id' =>Auth::user()->id ])->first();
        if($duplicate == null){

        if($request->wish != null){
           $wishlist = Wishlist::where('id', $request->wish)->first();
           $wishlist->delete();
        }

        if($request->search != null){
        $cart = new Cart;
        $cart->product_id = $request->product;
        $cart->user_id = Auth::user()->id;
        $cart->save();

        return redirect('/')->with('success', 'Added to Cart!');
        }
        
        $cart = new Cart;
        $cart->product_id = $request->product;
        $cart->user_id = Auth::user()->id;
        $cart->save();

        return back()->with('success', 'Added to Cart!');

    }else{
        if($request->search != null){
            return redirect('/')->with('success', 'Item already in Cart!');
        }
        return back()->with('success', 'Item already in Cart!');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $cart = Cart::where('id', $id)->first();
        $cart->quantity = $request->quantity;
        $cart->save();

        session()->flash('success', 'Quantity was Updated!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
