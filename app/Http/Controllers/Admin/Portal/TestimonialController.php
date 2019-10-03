<?php

namespace App\Http\Controllers\Admin\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Image;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $testimonial = Testimonial::latest()->get();
       return view('admin.portal.testimonial.index',compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portal.testimonial.create');
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
            'name'=>'required',
            'company'=>'required',
            'comment'=>'required',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);
             $image = $request->file('image');
             $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('/uploads/testimonial/thumbnails'))
            {
                Storage::disk('public')->makeDirectory('/uploads/testimonial/thumbnails');
            }
            if (!Storage::disk('public')->exists('/uploads/testimonial/normal'))
            {
                Storage::disk('public')->makeDirectory('/uploads/testimonial/normal');
            }
    //            resize image for category and upload
            $postImageThumb = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('uploads/testimonial/thumbnails/'.$imagename,$postImageThumb);
            $postImageNormal = Image::make($image)->stream();
            Storage::disk('public')->put('uploads/testimonial/normal/'.$imagename,$postImageNormal);
        }else{
            $imagename="testimonial.png";
        }
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->company = $request->company;
        $testimonial->comment = $request->comment;
        $testimonial->image = $imagename;
        $testimonial->save();
        Toastr::success("New Testimonial ".$request->input('name')." Has Been Created");
        return redirect()->back();
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
       $testimonial = Testimonial::find($id);
       return view('admin.portal.testimonial.edit',compact('testimonial'));
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
            'name'=>'required',
            'company'=>'required',
            'comment'=>'required',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $testimonial = Testimonial::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('/uploads/testimonial/thumbnails'))
            {
                Storage::disk('public')->makeDirectory('/uploads/testimonial/thumbnails');
            }
            if (!Storage::disk('public')->exists('/uploads/testimonial/normal'))
            {
                Storage::disk('public')->makeDirectory('/uploads/testimonial/normal');
            }
    //            resize image for category and upload
            $postImageThumb = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('uploads/testimonial/thumbnails/'.$imagename,$postImageThumb);
            $postImageNormal = Image::make($image)->stream();
            Storage::disk('public')->put('uploads/testimonial/normal/'.$imagename,$postImageNormal);
        }else{
            $imagename = $testimonial->image;
        }
        $testimonial->name = $request->name;
        $testimonial->company = $request->company;
        $testimonial->comment = $request->comment;
        $testimonial->image = $imagename;
        $testimonial->save();
        Toastr::success('Testimonial Updated Successfully :)' ,'Success');
        return redirect()->route('testimonial.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial=Testimonial::find($id);
        $testimonial->delete();
        Toastr::Warning('Testimonial Successfully Deleted :)','Success');
        return redirect()->route('testimonial.index');
    }
}
