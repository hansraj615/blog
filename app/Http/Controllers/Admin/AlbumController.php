<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = Album::orderBy('id', 'DESC')->get();
        return view('admin.album.index',compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $category=Category::latest()->select('id','name')->get();
        $subcategory=SubCategory::latest()->select('id','name')->get();
        return view('admin.album.create',compact('category','subcategory'));
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
            'albumname'=>'required|min:4|max:25|unique:albums,name|unique_with:albums,albumname=name',
            'category'=>'required',
            'subcategory'=>'required',
            'description'=>'required|max:255',
             ],[
                'albumname.required'=>'Hi, Please Enter Album Name',
                'albumname.unique_with'=>'Album name with same Category and Subcategory is all ready Exist,Please enter different name or select diifferent Category and Subcategory',
                'albumname.min'=>'Album Cannot be less than 4 character',
                'albumname.max'=>'Album Cannot be more than 25 character',
                'description.required'=>'Hi, Please Enter Album Name',
                'description.max'=>'Description Cannot be more than 255 character'
            
                ]);
             $album = new Album();
             $album->name = $request->albumname;
             $album->description = $request->description;
             $album->category_id = $request->category;
             $album->subcategory_id = $request->subcategory;
             $album->slug = str_slug($request->albumname);
             $album->save();
             Toastr::success('Album Added Successfully :)' ,'Success');
             return redirect()->route('album.index');
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
        $album=Album::findOrFail($id);
        $category=Category::latest()->select('id','name')->get();
        $subcategory=SubCategory::latest()->select('id','name')->get();
        return view('admin.album.edit',compact('album','subcategory','category'));
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
            'albumname'=>'required|min:2|max:25|unique_with:albums,albumname=name,'.$id,
            'category'=>'required',
            'subcategory'=>'required',
            'description'=>'required',
             ]);
             $album=Album::find($id);
             $album->name = $request->albumname;
             $album->category_id = $request->category;
             $album->subcategory_id = $request->subcategory;
             $album->description = $request->description;
             $album->slug = str_slug($request->albumname);
             $album->save();
             Toastr::success('Album Updated Successfully :)' ,'Success');
             return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album=Album::find($id);
        $album->delete();
        Toastr::Warning('Album Successfully Deleted :)','Success');
        return redirect()->route('album.index');
    }

    public function getSubCategory(Request $request)
    {
        $category_id=$request->category;
        $subcategory=SubCategory::where('category_id','=',$category_id)->select('id','name')->get();
        if($subcategory->isNotEmpty())
        {
            return \Response::json($subcategory);
        }
        return \Response::json(['error'=>true]);
    }
}
