<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
            'name' => 'required|max:100|unique:sub_categories'
        ]);

        $subcategory = new SubCategory;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->slug = str_slug($request->name);
        $subcategory->save();

        return redirect('/admin/manage-sub-category')->with('success', 'Sub Category Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $subcategory = SubCategory::where('slug', $slug)->first();
        $categories = Category::orderBy('id', 'asc')->get();

        return view('admin.editsubcategory')->with(['subcategory' => $subcategory, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100'
        ]);

        $subcategory = SubCategory::where('id', $id)->first();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->slug = str_slug($request->name);
        $subcategory->save();

        return redirect('/admin/manage-sub-category')->with('success', 'Sub Category Updated!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::where('id', $id)->first();
        $subcategory->delete();
        return redirect('/admin/manage-sub-category')->with('success', 'Sub Category Deleted!');
    }
}
