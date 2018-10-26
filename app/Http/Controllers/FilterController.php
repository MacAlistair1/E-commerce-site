<?php

namespace App\Http\Controllers;

use DB;
use auth;
use App\Cart;
use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterproduct($slug, $range){
        
       $ranges = explode(';', $range);
       $frange = $ranges[0];
       $lrange = $ranges[1];

        $category = Category::where('slug', $slug)->first();
        $subcategory = SubCategory::where('category_id', $category->id)->first();
    

        $query = Product::where('category_id', $category->id)->get();

        if($frange && $lrange){
            $query = $query->where('price', '>=', $frange);
            $query = $query->where('price', '<=', $lrange);
        }
                             


        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
       
        $randomProducts = Product::where('bestseller', 1)->get();
       
        $brand = Product::inRandomOrder()->first();
        $title = "EW | ".$category->name;   


        return view('pages.filterproduct')->with(['frange' => $frange, 'lrange' => $lrange, 'category' => $category, 'subcategory' => $subcategory, 'title' => $title, 'brand' => $brand, 'carts' => $carts, 'products' => $query, 'category' => $category]);
   }


}
