<?php

namespace App\Http\Controllers;

use App\Userhistory;
use Illuminate\Http\Request;

class UserhistoryController extends Controller
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
     * @param  \App\Userhistory  $userhistory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history = Userhistory::where('id', $id)->first();
        
        $history->delete();
        return redirect('/my-history')->with('success', 'History Deleted!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Userhistory  $userhistory
     * @return \Illuminate\Http\Response
     */
    public function edit(Userhistory $userhistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Userhistory  $userhistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userhistory $userhistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Userhistory  $userhistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userhistory $userhistory)
    {
        //
    }
}
