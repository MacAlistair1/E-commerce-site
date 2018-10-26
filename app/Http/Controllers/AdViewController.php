<?php

namespace App\Http\Controllers;

use App\AdView;
use Illuminate\Http\Request;

class AdViewController extends Controller
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
            'name' => 'required',
            'page' => 'required',
            'image' => 'required|max:5000|mimes:jpg,jpeg,png,bmp,svg',
        ]);

        $name = $request->name;
        $page = $request->page;

        $ads = AdView::orderBy('id', 'asc')->get();
        foreach ($ads as $all_ad) {
           if ($all_ad->page == $page) {
                $all_ad->delete();
                unlink(public_path().'/assets/img/ads/'.$all_ad->image);

                $ad = new AdView;
                $ad->name = $name;
                $ad->page = $page;

                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image_ext = $image->getClientOriginalExtension();
                    $new_image_name = rand(123456,999999).".".$image_ext;
                    $destination_path = public_path('/assets/img/ads');
                    $image->move($destination_path, $new_image_name);
                }else{
                    return back()->with('error', 'Please Choose an Ad Image!'); 
                }
        
                $ad->image = $new_image_name;
                $ad->save();

                return redirect('/admin/manage-ads')->with('success', 'New Ad Image Added!!');
           }
        }

        $ad = new AdView;
        $ad->name = $name;
        $ad->page = $page;

     
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_ext = $image->getClientOriginalExtension();
            $new_image_name = rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/assets/img/ads');
            $image->move($destination_path, $new_image_name);
        }else{
            return back()->with('error', 'Please Choose an Ad Image!'); 
        }

        $ad->image = $new_image_name;
        $ad->save();

        return redirect('/admin/manage-ads')->with('success', 'New Ad Image Added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdView  $adView
     * @return \Illuminate\Http\Response
     */
    public function show(AdView $adView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdView  $adView
     * @return \Illuminate\Http\Response
     */
    public function edit(AdView $adView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdView  $adView
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdView $adView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdView  $adView
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = AdView::where('id', $id)->first();

        $ad->delete();
        

        return back()->with('success', 'Ad Deleted!!'); 
    }
}
