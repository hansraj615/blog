<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Category;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Image;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::orderBy('id', 'DESC')->get();
        return view('admin.gallery.index',compact('gallery'));
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
        $album=Album::latest()->select('id','name')->get();
        return view('admin.gallery.create',compact('category','subcategory','album'));
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
            'galleryname'=>'required|min:4|max:25|unique:galleries,name',
            'album'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'description'=>'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ],[
                'galleryname.required'=>'Hi, Please Enter Album Name',
                'galleryname.min'=>'galleryname Cannot be less than 4 character',
                'galleryname.max'=>'galleryname Cannot be more than 25 character',
                'description.required'=>'Hi, Please Enter galleryname  Name',
                'description.max'=>'Description Cannot be more than 255 character'
            
            
                ]);
                $image = $request->file('image');
             $slug = str_slug($request->galleryname);
             if (isset($image))
             {
     //            make unique name for image
                 $currentDate = Carbon::now()->toDateString();
                 $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
     //            check category dir is exists
                 if (!Storage::disk('public')->exists('/uploads/gallery/thumbnails'))
                 {
                     Storage::disk('public')->makeDirectory('/uploads/gallery/thumbnails');
                 }
                 if (!Storage::disk('public')->exists('/uploads/gallery/normal'))
                 {
                     Storage::disk('public')->makeDirectory('/uploads/gallery/normal');
                 }
     //            resize image for category and upload
                 $postImageThumb = Image::make($image)->resize(500,500)->stream();
                 Storage::disk('public')->put('uploads/gallery/thumbnails/'.$imagename,$postImageThumb);
                 $postImageNormal = Image::make($image)->stream();
                 Storage::disk('public')->put('uploads/gallery/normal/'.$imagename,$postImageNormal);
     
                 
     
             } else {
                 $imagename = "default.png";
             }
             $gallery = new Gallery();
             $gallery->name = $request->galleryname;
             $gallery->description = $request->description;
             $gallery->album_id = $request->album;
             $gallery->category_id = $request->category;
             $gallery->subcategory_id = $request->subcategory;
             $gallery->slug = $slug;
             $gallery->image =$imagename;
             $gallery->save();
             Toastr::success('Gallery Added Successfully :)' ,'Success');
             return redirect()->route('gallery.index');
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
        $gallery=Gallery::findOrFail($id);
        $album=Album::latest()->select('id','name')->get();
        $category=Category::latest()->select('id','name')->get();
        $subcategory=SubCategory::latest()->select('id','name')->get();
        return view('admin.gallery.edit',compact('gallery','subcategory','category','album'));
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
            'galleryname'=>'required|min:4|max:25|unique_with:galleries,galleryname=name,'.$id,
            'album'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'description'=>'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ],[
                'galleryname.required'=>'Hi, Please Enter Album Name',
                'galleryname.min'=>'galleryname Cannot be less than 4 character',
                'galleryname.max'=>'galleryname Cannot be more than 25 character',
                'description.required'=>'Hi, Please Enter galleryname  Name',
                'description.max'=>'Description Cannot be more than 255 character'
            
            
                ]);
                $image = $request->file('image');
                $slug = str_slug($request->galleryname);
                $gallery = Gallery::find($id);
                if (isset($image))
                {
                    //            make unique name for image
                    $currentDate = Carbon::now()->toDateString();
                    $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            //            check category dir is exists
                    if (!Storage::disk('public')->exists('/uploads/gallery/thumbnails'))
                    {
                        Storage::disk('public')->makeDirectory('/uploads/gallery/thumbnails');
                    }
                    if (!Storage::disk('public')->exists('/uploads/gallery/normal'))
                    {
                        Storage::disk('public')->makeDirectory('/uploads/gallery/normal');
                    }
            //            resize image for category and upload
                    $postImageThumb = Image::make($image)->resize(500,500)->stream();
                    Storage::disk('public')->put('uploads/gallery/thumbnails/'.$imagename,$postImageThumb);
                    $postImageNormal = Image::make($image)->stream();
                    Storage::disk('public')->put('uploads/gallery/normal/'.$imagename,$postImageNormal);

        
                    
        
                } else {
                    $imagename = $gallery->image;
                }
                $gallery->name = $request->galleryname;
                $gallery->description = $request->description;
                $gallery->album_id = $request->album;
                $gallery->category_id = $request->category;
                $gallery->subcategory_id = $request->subcategory;
                $gallery->slug = $slug;
                $gallery->image =$imagename;
                $gallery->save();
                Toastr::success('Gallery Updated Successfully :)' ,'Success');
                return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery=Gallery::find($id);
        $gallery->delete();
        Toastr::Warning('Gallery Successfully Deleted :)','Success');
        return redirect()->route('gallery.index');
    }

    public function getCategory(Request $request)
    {
        $album_id=$request->album;
        $category=Album::join('categories', 'categories.id', '=', 'albums.category_id')
            ->where('albums.id','=',$album_id)
            ->select('categories.id', 'categories.name')
            ->get();
        if($category->isNotEmpty())
        {
            return \Response::json($category);
        }
        return \Response::json(['error'=>true]);
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
