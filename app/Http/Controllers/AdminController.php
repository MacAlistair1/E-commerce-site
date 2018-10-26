<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\AdView;
use App\Product;
use App\Category;
use App\Checkout;
use App\Feedback;
use App\Subscriber;
use App\OwnerDetail;
use App\SubCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        $admin = Admin::orderBy('id', 'asc')->get();
        $products = Product::orderBy('id', 'asc')->get();
        $category = Category::orderBy('id', 'asc')->get();
        $subcategory = SubCategory::orderBy('id', 'asc')->get();
        $feedback = Feedback::orderBy('id', 'asc')->get();
        $subscribers = Subscriber::orderBy('id', 'asc')->get();
        $unique = Checkout::select('unique_id')->distinct()->pluck('unique_id');

        return view('admin.home')->with(['users' => count($users), 
        'products' => count($products), 
        'orders' => count($unique), 
        'subscribers' => count($subscribers),
        'category' => count($category),
        'subcategory' => count($subcategory),
        'feedback' => count($feedback),
        'admin' => count($admin)
        ]);
    }

    public function category(){
        $categories = Category::orderBy('name', 'asc')->paginate(5);
        return view('admin.managecategory')->with('categories', $categories);
    }

    public function subcategory(){
        $categories = Category::orderBy('id', 'asc')->get();
        $subcategories = SubCategory::orderBy('id', 'asc')->paginate(5);
        return view('admin.managesubcategory')->with(['categories' => $categories, 'subcategories' => $subcategories]);
    }

    public function feedback(){
        $messages = Feedback::orderBy('id', 'asc')->paginate(5);
        return view('admin.managefeedback')->with('messages', $messages);
    }

    public function addproduct(){
        $subcategories = SubCategory::orderBy('id', 'asc')->get();
        return view('admin.addproduct')->with('subcategories', $subcategories);
    }

    public function manageproduct(){
        $products = Product::orderBy('id', 'asc')->paginate(5);
        return view('admin.manageproduct')->with('products', $products);
    }

    public function manageorder(){
        $orders = Checkout::orderBy('time', 'asc')->get();
        $unique = Checkout::select('unique_id')->distinct()->pluck('unique_id');
        $user = Checkout::select('user_id')->distinct()->pluck('user_id');
        
        return view('admin.manageorders')->with(['orders' => $orders, 'unique' => $unique, 'user' => $user]);
    }

    public function manageuser(){
        $users = User::orderBy('fname', 'asc')->paginate(10);
        return view('admin.manageuser')->with('users', $users);
    }

    public function manageadmin(){
        $admins = Admin::orderBy('name', 'asc')->paginate(10);
        return view('admin.manageadmin')->with('admins', $admins);
    }

    public function manageowner(){
        $detail = OwnerDetail::first();
        return view('admin.changeownerdetail')->with('detail', $detail);
    }

    public function manageads(){
        $ads = AdView::orderBy('id', 'asc')->get();
        return view('admin.manageads')->with('ads', $ads);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        
        return redirect('/admin/manage-admins')->with('success', 'Admin Deleted!');
    }

}
