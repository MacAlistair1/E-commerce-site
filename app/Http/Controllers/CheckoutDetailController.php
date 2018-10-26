<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Checkout;
use App\CheckoutDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutDetailController extends Controller
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

        $this->validate($request, [
            'contact' => 'required|max:15|min:10',
            'address' => 'required',
            'city' => 'required'
        ]);

        date_default_timezone_set('Asia/Karachi');
      
        $unique = null;
        $total = 0;
        
        $carts = Cart::where('user_id', Auth::user()->id)->get();
       
        $myunique = Checkout::where('user_id', Auth::user()->id)->orderBy('unique_id', 'desc')->take(1)->first();
    
        if($myunique == null){
            $unique = 1;
        }else{
             $unique = ($myunique->unique_id)+1;
        }


        foreach ($carts as $cart) {
            $checkout = new Checkout;
            $checkout->user_id = Auth::user()->id;
            $checkout->product_id = $cart->product_id;
            $checkout->quantity = $cart->quantity;
            $checkout->unique_id = $unique;
            $checkout->time = date('Y-m-d h:i:s');
            $checkout->save();

            $detail = new CheckoutDetail;
            $detail->contact = $request->contact;
            $detail->address = $request->address;
            $detail->city = $request->city;
            $detail->checkout_id = $checkout->id;
            $detail->time = date('Y-m-d h:i:s');
            $detail->save();

            $cart->delete();
        }

       


       



        return redirect('/')->with('success', 'Thanks for shopping!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CheckoutDetail  $checkoutDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CheckoutDetail $checkoutDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CheckoutDetail  $checkoutDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckoutDetail $checkoutDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CheckoutDetail  $checkoutDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckoutDetail $checkoutDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CheckoutDetail  $checkoutDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckoutDetail $checkoutDetail)
    {
        //
    }
}
