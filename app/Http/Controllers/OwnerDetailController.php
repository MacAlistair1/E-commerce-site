<?php

namespace App\Http\Controllers;

use App\OwnerDetail;
use Illuminate\Http\Request;

class OwnerDetailController extends Controller
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
     * @param  \App\OwnerDetail  $ownerDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OwnerDetail $ownerDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OwnerDetail  $ownerDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OwnerDetail $ownerDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OwnerDetail  $ownerDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OwnerDetail $ownerDetail)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required|max:15|min:10',
            'location' => 'required',
            'location_url' => 'required',
            'fb_url' => 'required',
            'twitter_url' => 'required',
            'insta_url' => 'required',
            'yt_url' => 'required',
            'gplus_url' => 'required',
            'opening_closing_day' => 'required',
            'about_us' => 'required',
            'top_heading_title' => 'required'
        ]);

        $ownerDetail->name = $request->name;
        $ownerDetail->email = $request->email;
        $ownerDetail->contact = $request->contact;
        $ownerDetail->location = $request->location;
        $ownerDetail->location_url = $request->location_url;
        $ownerDetail->fb_url = $request->fb_url;
        $ownerDetail->twitter_url = $request->twitter_url;
        $ownerDetail->insta_url = $request->insta_url;
        $ownerDetail->yt_url = $request->yt_url;
        $ownerDetail->gplus_url = $request->gplus_url;
        $ownerDetail->opening_closing_day = $request->opening_closing_day;
        $ownerDetail->about_us = $request->about_us;
        $ownerDetail->top_heading_title = $request->top_heading_title;

      
         
        if($request->logo != null){
        
            if($ownerDetail->logo != null){
                unlink(public_path().'/assets/img/site/'.$ownerDetail->logo);
            }

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logo_ext = $logo->getClientOriginalExtension();
            $new_logo_name = rand(123456,999999).".".$logo_ext;
            $destination_path = public_path('/assets/img/site');
            $logo->move($destination_path, $new_logo_name);
        }else{
            return back()->with('error', 'Please Choose a Logo image!'); 
        }
        $ownerDetail->logo = $new_logo_name;
    }

    if($request->banner1_img != null){
        
        if($ownerDetail->banner1_img != null){
            unlink(public_path().'/assets/img/site/'.$ownerDetail->banner1_img);
        }

    if($request->hasFile('banner1_img')){
        $banner1_img = $request->file('banner1_img');
        $banner1_img_ext = $banner1_img->getClientOriginalExtension();
        $new_banner1_img_name = rand(123456,999999).".".$banner1_img_ext;
        $destination_path = public_path('/assets/img/site');
        $banner1_img->move($destination_path, $new_banner1_img_name);
    }else{
        return back()->with('error', 'Please Choose a Banner image 1!'); 
    }
    $ownerDetail->banner1_img = $new_banner1_img_name;
}

if($request->banner2_img != null){
        
    if($ownerDetail->banner2_img != null){
        unlink(public_path().'/assets/img/site/'.$ownerDetail->banner2_img);
    }

if($request->hasFile('banner2_img')){
    $banner2_img = $request->file('banner2_img');
    $banner2_img_ext = $banner2_img->getClientOriginalExtension();
    $new_banner2_img_name = rand(123456,999999).".".$banner2_img_ext;
    $destination_path = public_path('/assets/img/site');
    $banner2_img->move($destination_path, $new_banner2_img_name);
}else{
    return back()->with('error', 'Please Choose a Banner image 2!'); 
}
$ownerDetail->banner2_img = $new_banner2_img_name;
}

        $ownerDetail->save();

        return redirect('/admin/manage-owner')->with('success', 'Owner Details Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OwnerDetail  $ownerDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OwnerDetail $ownerDetail)
    {
        //
    }
}
