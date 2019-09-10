<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
 use Brian2694\Toastr\Facades\Toastr;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index',compact('category'));
    }
    public function getAll()
    {
        // dd("Asd");
        // return "hg";
        $category = Category::orderBy('id', 'DESC')->first();
        // dd($category);
        return $category;
    }
         
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }
     
    public function store(Request $request)
    {
        $this->validate($request,[
            'categoryname'=>'required',
            'description'=>'required',
             ]);
             $category = new Category();
             $category->name = $request->categoryname;
             $category->description = $request->description;
             $category->slug = str_slug($request->categoryname);
             $category->save();
             Toastr::success('Category Added Successfully :)' ,'Success');
             return redirect()->route('category.index');
    }
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'categoryname'=>'required',
            'description'=>'required',
             ]);
             $category=Category::find($id);
             $category->name = $request->categoryname;
             $category->description = $request->description;
             $category->slug = str_slug($request->categoryname);
             $category->save();
             Toastr::success('Category Updated Successfully :)' ,'Success');
             return redirect()->route('category.index');
    }
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        Toastr::Warning('Tag Successfully Deleted :)','Success');
        return redirect()->route('category.index');
    }
     
}
