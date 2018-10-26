<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Userhistory;
use Illuminate\Http\Request;

class CheckoutController extends Controller
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


        $detail = explode(";", $id);
        $c_id = $detail[0];
        $total = $detail[1];


        $product_name = array();
        $product_quantity = array();
        $checkouts = Checkout::where('user_id', $c_id)->get();
        $user = null;
        foreach($checkouts as $checkout){
            $product_name[] =  $checkout->product->name;
            $product_quantity[] =  $checkout->quantity;
            $user = $checkout->user_id;
            $checkout->delete();
        }

        $p_name = implode("|", $product_name);
        $p_q = implode("|", $product_quantity);

        $history = new Userhistory;
        $history->user_id = $user;
        $history->product_name = $p_name;
        $history->quantity = $p_q;
        $history->total = $total;
        $history->save();

        $all_checkouts = Checkout::orderBy('unique_id', 'asc')->get();

        foreach ($all_checkouts as $new_checkout) {
                if ($new_checkout->unique_id != 1) {
                    $new_checkout->unique_id = ($new_checkout->unique_id)-1;
                    $new_checkout->save();
                }
        }

        return redirect('/admin/manage-orders')->with('success', 'Marked as Delivered!');
    }
}
