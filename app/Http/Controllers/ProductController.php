<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
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
            'subcategory' => 'required',
            'name' => 'required|max:150|unique:products',
            'detail' => 'required|max:300',
            'price' => 'required',
            'stock' => 'required',
            'code' => 'required|max:5|unique:products',
            'desc' => 'required|max:1000'
        ]);

        $product = new Product;
        $subcategory = SubCategory::where('id', $request->subcategory)->first();
        $product->subcategory_id = $request->subcategory;
        $product->category_id = $subcategory->category->id;
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->off = $request->off;
        $product->stock = $request->stock;
        $product->code = $request->code;
        $product->description = $request->desc;


        $product->tags = $request->tags;


        if($request->bestseller == null){
            $product->bestseller  = 0;
        }else{
            $product->bestseller = $request->bestseller;
        }

        if($request->popular == null){
            $product->popular  = 0;
        }else{
            $product->popular = $request->popular;
        }

        if($request->seasonal == null){
            $product->seasonal  = 0;
        }else{
            $product->seasonal = $request->seasonal;
        }
        
        if($request->topsell == null){
            $product->topsell  = 0;
        }else{
            $product->topsell = $request->topsell;
        }

        if($request->highprice == null){
            $product->highprice  = 0;
        }else{
            $product->highprice = $request->highprice;
        }

        if($request->featured == null){
            $product->featured  = 0;
        }else{
            $product->featured = $request->featured;
        }

        if($request->branding == null){
            $product->branding  = 0;
        }else{
            $product->branding = $request->branding;
        }

        $image_array = array();
        $image_name = array();
        if($request->hasFile('img')){
            $image_array = $request->file('img');
            $array_len = count($image_array);

            for ($i=0; $i < $array_len ; $i++) { 
                $image_ext = $image_array[$i]->getClientOriginalExtension();
                $new_image_name = rand(123456, 999999).".".$image_ext;
                $destination_path = public_path('/assets/img/products/'.$subcategory->category->id.'/'.$request->subcategory.'/');
                $image_array[$i]->move($destination_path, $new_image_name);

               $image_name[] = $new_image_name;
            }
        }else{
            return back()->with('error', 'Please Choose an Images!'); 
        }
        $img_name = implode("|", $image_name);
        $product->image = $img_name;
        $product->save();



        return redirect('/admin/manage-product')->with('success', 'Product Added!');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $subcategories = SubCategory::orderBy('id', 'asc')->get();
        
        return view('admin.editproduct')->with(['product' => $product, 'subcategories' => $subcategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       

        $this->validate($request, [
            'subcategory' => 'required',
            'name' => 'required|max:150',
            'detail' => 'required|max:300',
            'price' => 'required',
            'stock' => 'required',
            'code' => 'required|max:5',
            'desc' => 'required|max:1000'
        ]);

        $product = Product::where('id', $id)->first();
        $cat =  $product->category->id;
        $subcat =  $product->subcategory->id;

        $subcategory = SubCategory::where('id', $request->subcategory)->first();
        $product->subcategory_id = $request->subcategory;
        $product->category_id = $subcategory->category->id;
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->off = $request->off;
        $product->stock = $request->stock;
        $product->code = $request->code;
        $product->description = $request->desc;
        $product->tags = $request->tags;

        if($request->bestseller == null){
            $product->bestseller  = 0;
        }else{
            $product->bestseller = $request->bestseller;
        }

        if($request->popular == null){
            $product->popular  = 0;
        }else{
            $product->popular = $request->popular;
        }

        if($request->seasonal == null){
            $product->seasonal  = 0;
        }else{
            $product->seasonal = $request->seasonal;
        }
        
        if($request->topsell == null){
            $product->topsell  = 0;
        }else{
            $product->topsell = $request->topsell;
        }

        if($request->highprice == null){
            $product->highprice  = 0;
        }else{
            $product->highprice = $request->highprice;
        }

        if($request->featured == null){
            $product->featured  = 0;
        }else{
            $product->featured = $request->featured;
        }

        if($request->branding == null){
            $product->branding  = 0;
        }else{
            $product->branding = $request->branding;
        }

        
        if($request->img != null){
        
            if($product->image != null){
                $old_img = explode("|", $product->image);
                for($i=0; $i < count($old_img); $i++){
                    unlink(public_path().'/assets/img/products/'.$cat.'/'.$subcat.'/'.$old_img[$i]);
                }
            }
           
        

        $image_array = array();
        $image_name = array();
        if($request->hasFile('img')){
            $image_array = $request->file('img');
            $array_len = count($image_array);

            for ($i=0; $i < $array_len ; $i++) { 
                $image_ext = $image_array[$i]->getClientOriginalExtension();
                $new_image_name = rand(123456, 999999).".".$image_ext;
                $destination_path = public_path('/assets/img/products/'.$subcategory->category->id.'/'.$request->subcategory.'/');
                $image_array[$i]->move($destination_path, $new_image_name);

               $image_name[] = $new_image_name;
            }
        }else{
            return back()->with('error', 'Please Choose an Images!'); 
        }
        
        $img_name = implode("|", $image_name);
        $product->image = $img_name;
    }
        $product->save();


        return redirect('/admin/manage-product')->with('success', 'Product Updated!');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $cat =  $product->category->id;
        $subcat =  $product->subcategory->id;

        $old_img = explode("|", $product->image);
        for($i=0; $i < count($old_img); $i++){
            unlink(public_path().'/assets/img/products/'.$cat.'/'.$subcat.'/'.$old_img[$i]);
        }
        $product->delete();

        return redirect('/admin/manage-product')->with('success', 'Product Deleted!');
    }
}
