<?php

namespace App\Http\Controllers\Admin\Portal;

use App\About;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::latest()->get();
        $testimonial = Testimonial::latest()->get();
       return view('admin.about',compact('about','testimonial'));
    }
    public function adminIndex()
    {
        $about=About::latest()->get();
       return view('admin.portal.about.index',compact('about'));
    }
    public function saveUserProfileImage(Request $request)
    {
        $this->validate($request,[
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);

             $image = $request->file('image');
             $slug = str_slug("Tanweer Alam");
             if (isset($image))
             {
     //            make unique name for image
                 $currentDate = Carbon::now()->toDateString();
                 $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
     //            check category dir is exists
                 if (!Storage::disk('public')->exists('/uploads/portal/about/thumbnails'))
                 {
                     Storage::disk('public')->makeDirectory('/uploads/portal/about/thumbnails');
                 }
                 if (!Storage::disk('public')->exists('/uploads/portal/about/normal'))
                 {
                     Storage::disk('public')->makeDirectory('/uploads/portal/about/normal');
                 }
     //            resize image for category and upload
                 $postImageThumb = Image::make($image)->resize(500,500)->stream();
                 Storage::disk('public')->put('uploads/portal/about/thumbnails/'.$imagename,$postImageThumb);
                 $postImageNormal = Image::make($image)->stream();
                 Storage::disk('public')->put('uploads/portal/about/normal/'.$imagename,$postImageNormal);
     
                 
     
             } else {
                 $imagename = "default.png";
             }
             $about = About::find(1);
             $about->image=$imagename;
             $about->save();
             Toastr::success('Added Successfully :)' ,'Success');
             return redirect()->route('about.index');
    }

    public function clientCountStore(Request $request)
    {
        $this->validate($request,[
            'yojexperiance' =>'required',
            'happyclient' =>'required',
            'projectcompleted' =>'required',
        ],[
            'yojexperiance.required'=>'Hi, Please Enter Year Of Experiance',
            'happyclient.required'=>'Hi, Please Enter Number of Happy Client',
            'projectcompleted.required'=>'Hi, Please Enter Number of Project Completed'
        
            ]);
        $about = About::find(1);
        $about->yojexperiance=$request->yojexperiance;
        $about->happyclient = $request->happyclient;
        $about->projectcompleted = $request->projectcompleted;
        $about->save();
        Toastr::success('Added Successfully :)' ,'Success');
        return redirect()->route('about.index');

    }

    public function aboutStore(Request $request)
    {
        $this->validate($request,[
            'about' =>'required',
        ],[
            'about.required'=>'Hi, Please Enter About You',
            ]);
        $about = About::find(1);
        $about->about=$request->about;
        $about->save();
        Toastr::success('Added Successfully :)' ,'Success');
        return redirect()->route('about.index');
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
