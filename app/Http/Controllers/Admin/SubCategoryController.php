<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Validator;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::orderBy('id', 'DESC')->get();
        return view('admin.subcategory.index',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::latest()->select('id','name')->get();
        return view('admin.subcategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'subcategoryname'=>'required|min:4|max:25|unique_with:sub_categories,subcategoryname=name,category=category_id',
            'category'=>'required',
            'description'=>'required|max:255',
             ],[
                'subcategoryname.required'=>'Hi, Please Enter Subcategory Name',
                'subcategoryname.unique_with'=>'Subcategory name with same Category is all ready Exist,Please enter different name or select diifferent Category',
                'subcategoryname.min'=>'SubCategory Cannot be less than 4 character',
                'subcategoryname.max'=>'SubCategory Cannot be more than 25 character',
                'description.required'=>'Hi, Please Enter Subcategory Name',
                'description.max'=>'Description Cannot be more than 255 character'
            
                ]);
             $subcategory = new SubCategory();
             $subcategory->name = $request->subcategoryname;
             $subcategory->description = $request->description;
             $subcategory->category_id = $request->category;
             $subcategory->slug = str_slug($request->subcategoryname);
             $subcategory->save();
             Toastr::success('SubCategory Added Successfully :)' ,'Success');
             return redirect()->route('subcategory.index');
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
        $subcategory=SubCategory::findOrFail($id);
        $category=Category::latest()->select('id','name')->get();
        return view('admin.subcategory.edit',compact('subcategory','category'));
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
        $this->validate($request,[
            'subcategoryname'=>'required|min:2|max:255|unique_with:sub_categories,subcategoryname=name,category=category_id,'.$id,
            'category'=>'required',
            'description'=>'required',
             ]);
             $subcategory=SubCategory::find($id);
             $subcategory->name = $request->subcategoryname;
             $subcategory->category_id = $request->category;
             $subcategory->description = $request->description;
             $subcategory->slug = str_slug($request->subcategoryname);
             $subcategory->save();
             Toastr::success('SubCategory Updated Successfully :)' ,'Success');
             return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory=SubCategory::find($id);
        $subcategory->delete();
        Toastr::Warning('SubCategory Successfully Deleted :)','Success');
        return redirect()->route('subcategory.index');
    }
}
