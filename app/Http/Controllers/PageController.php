<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Cart;
use App\AdView;
use App\Product;
use App\Category;
use App\Checkout;
use App\Wishlist;
use App\OwnerDetail;
use App\SubCategory;
use App\Userhistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function all_details(){
        $owner = OwnerDetail::first();
        $shop = AdView::where('page', 'Shop Now')->pluck('image');
        Session::flash('contact', $owner->contact);
        Session::flash('email', $owner->email);
        Session::flash('location', $owner->location);
        Session::flash('name', $owner->name);
        Session::flash('about', $owner->about_us);
        Session::flash('open_close', $owner->opening_closing_day);
        Session::flash('fb_url', $owner->fb_url);
        Session::flash('twitter_url', $owner->twitter_url);
        Session::flash('insta_url', $owner->insta_url);
        Session::flash('yt_url', $owner->yt_url);
        Session::flash('gplus_url', $owner->gplus_url);
        Session::flash('logo', $owner->logo);
        Session::flash('head_title', $owner->top_heading_title);

        Session::flash('ad', $shop[0]);


    }
     

    public function landingPage(){
        
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $title = "Everest Wings";
        $categories = Category::orderBy('name', 'asc')->get();
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $popularproducts = Product::where('popular', 1)->get();
        $bestseller = Product::where('bestseller', 1)->get();
        $seasonalproducts = Product::where('seasonal', 1)->get();
        $topsellProducts = Product::where('topsell', 1)->get();
        $highprices = Product::where('highprice', 1)->get();
        $brand = Product::where('branding', 1)->first();
        $owner = OwnerDetail::first();
        $this->all_details();

        $landingpage0 = AdView::where('page', 'Landing Page 0')->pluck('image');
        $landingpage1 = AdView::where('page', 'Landing Page 1')->pluck('image');
        $landingpage2 = AdView::where('page', 'Landing Page 2')->pluck('image');
        $land = array($landingpage0, $landingpage1, $landingpage2);


        return view('welcome')->with(['title' => $title, 'land' => $land, 'owner' => $owner, 'brand' => $brand, 'categories' => $categories, 'subcategories' => $subcategories,  'popularproducts' => $popularproducts, 'bestproducts' => $bestseller, 'seasonalproducts' => $seasonalproducts, 'topsellProducts' => $topsellProducts, 'carts' => $carts, 'highprices' => $highprices]);
    }

    public function product($cat, $id){
        $category = Category::where('slug', $cat)->first();
        $products = Product::where(['category_id' => $category->id])->paginate(8);

        $this->all_details();
       
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
       
        $randomProducts = Product::where('bestseller', 1)->get();
        $popular = Product::where('branding', 1)->get();
       
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $title = "EW | ".$category->name;      
        $brand = Product::inRandomOrder()->first();

        $shop = AdView::where('page', 'Shop Now')->pluck('image');

        if($id != "all"){
            if($id == "sort=nameA"){
                $sortproducts = Product::where('category_id', $category->id)->orderBy('name', 'asc')->paginate(8);
            }else if($id == "sort=nameD"){
                $sortproducts = Product::where('category_id', $category->id)->orderBy('name', 'desc')->paginate(8);
            }else if($id == "sort=priceA"){
                $sortproducts = Product::where('category_id', $category->id)->orderBy('price', 'asc')->paginate(8);
            }else if($id == "sort=priceD"){
                $sortproducts = Product::where('category_id', $category->id)->orderBy('price', 'desc')->paginate(8);
            }
            
            $carts = "";
            if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
            }
            $subcategories = SubCategory::inRandomOrder()->take(5)->get();
            $category = Category::where('slug', $cat)->first();
            $randomProducts = Product::where('bestseller', 1)->get();
            $popular = Product::where('highprice', 1)->get();
            $title = "EW | ".$category->name;  
            $brand = Product::inRandomOrder()->first();
            return view('pages.product')->with(['title' => $title, 'shop' => $shop, 'brand'=> $brand ,'products' => $sortproducts , 'populars' => $popular , 'subcategories' => $subcategories, 'carts' => $carts, 'category' => $category, 'bestproducts' => $randomProducts]);
        }

        return view('pages.product')->with(['title'=> $title, 'shop' => $shop, 'brand'=> $brand, 'populars' => $popular , 'carts' => $carts, 'subcategories' => $subcategories, 'products' => $products, 'category' => $category, 'bestproducts' => $randomProducts]);
    }

    public function productdetail($catslug, $subcatslug, $slug){
        $this->all_details();

        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $category = Category::where('slug', $catslug)->first();
        $subcategory = SubCategory::where('slug', $subcatslug)->first();
        $product = Product::where(['slug' => $slug, 'category_id' => $category->id, 'subcategory_id' => $subcategory->id ])->first();
        $title = "EW | ".$product->name;
       // $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $brand = Product::inRandomOrder()->first();
        $featuredProducts = Product::where('featured', 1)->get();
        $detail = AdView::where('page', 'Product Detail Page')->pluck('image');

        return view('pages.productdetail')->with(['title'=> $title, 'detail' => $detail, 'carts' => $carts, 'product' => $product, 'featuredProducts' => $featuredProducts, 'brand' => $brand]);
    }

    public function cart(){
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $title = "EW | My Cart";
        return view('pages.cart')->with(['title'=> $title, 'carts' => $carts, 'subcategories' => $subcategories]);
    }

    public function checkout(){
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $title = "EW | Check Out";
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        return view('pages.checkout-form')->with(['title'=> $title, 'carts' => $carts, 'subcategories' => $subcategories]);
    }

    public function search(Request $request){
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $query = $request->search;
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $title = "EW | ".$query;
        $searchresults = Product::where('name', $query)
                                    ->orWhere('price', $query)
                                    ->orWhere('tags', $query)
                                    ->orWhere('description', $query)
                                    ->orWhere('detail', $query)->get();
        return view('pages.search')->with(['title'=> $title, 'carts' => $carts, 'searchresults' => $searchresults, 'subcategories' => $subcategories]);
    }

    public function wishlist(){
        $this->all_details();
        $carts = "";
        $wishlists = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
            $wishlists = Wishlist::where('user_id', $user_id)->get();
        }
        $title = "EW | Wishlist";
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        return view('pages.wishlist')->with(['title'=> $title, 'carts' => $carts, 'wishlists' =>$wishlists,  'subcategories' => $subcategories]);
    }

    public function contact(){
        $owner = OwnerDetail::first();
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $title = "EW | Contact";
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        return view('pages.contact')->with(['title'=> $title, 'owner' => $owner, 'carts' => $carts, 'subcategories' => $subcategories]);
    }

    public function registerme(){
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $title = "EW | Register";
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $register = AdView::where('page', 'Register Page')->pluck('image');
        return view('pages.registerme')->with(['title'=> $title, 'register' => $register, 'carts' => $carts, 'subcategories' => $subcategories]);
    }

    public function sale(){
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $title = "EW | Hot Sale";
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $popularproducts = Product::inRandomOrder()->paginate(9);
        return view('pages.sale')->with(['title'=> $title, 'carts' => $carts, 'subcategories' => $subcategories, 'popularproducts' => $popularproducts]);
    }

    public function wholesale(){
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $title = "EW | Wholesale";
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $popularproducts = Product::inRandomOrder()->paginate(9);
        return view('pages.wholesale')->with(['title'=> $title, 'carts' => $carts, 'subcategories' => $subcategories, 'popularproducts' => $popularproducts]);
    }

    public function about(){
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $title = "EW | About";
        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $about = OwnerDetail::select('about_us')->pluck('about_us');
        return view('pages.about')->with(['title'=> $title, 'about' => $about, 'carts' => $carts, 'subcategories' => $subcategories]);
    }

   

    public function orders(){
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $title = "EW | Orders";

        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $orders = Checkout::where('user_id', $user_id)->get();
     
        $unique = Checkout::select('unique_id')->distinct()->pluck('unique_id');
        
        return view('pages.orders')->with(['title'=> $title, 'carts' => $carts, 'subcategories' => $subcategories, 'orders' => $orders, 'unique' => $unique]);
    }

    public function ranger($slug, $slug1, $range){
       
        
        $myran = explode(';', $range);
        $frange = $myran[0];
        $lrange = $myran[1];

        $category = Category::where('slug', $slug)->first();
       
         $this->all_details();

        return redirect('/filtered/'.$category->slug.'/range/'.$range);     

       
       
    }

    public function history(){
        $this->all_details();
        $carts = "";
        if (Auth::user()) {
            $user_id = auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        $title = "EW | Orders";

        $subcategories = SubCategory::inRandomOrder()->take(5)->get();
        $histories = Userhistory::where('user_id', auth::user()->id)->orderBy('created_at', 'asc')->paginate(10);
        return view('pages.history')->with(['title'=> $title, 'carts' => $carts, 'subcategories' => $subcategories, 'histories' => $histories]);
    }

    
}
