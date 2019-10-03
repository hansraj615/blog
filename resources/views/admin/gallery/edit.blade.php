@extends('adminlte::page')

@section('title', 'Gallery Edit')
@push('css')
 
@endpush
@section('content')
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Gallery Edit
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Gallery</a></li>
            <li class="active">Edit Gallery</li>
          </ol>
        </section>
       
        <!-- Main content -->
        <section class="content">
        <a href="{{route('gallery.index')}}"   class="btn btn-success align-right">All Gallery</a>
            <br> <br>
          <div class="row">
            <!-- left column -->
            
            <div class="  col-md-6 ">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Gallery</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST"action="{{ route('gallery.update',$gallery->id) }}" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors dz-clickable">
                   
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group ">
                      <label for="galleryname">Name</label>
                    <input type="text" class="form-control is-valid {{($errors->first('galleryname') ? " form-error" : "form-valid")}}" id="galleryname" name="galleryname"  value="{{$gallery->name}}" placeholder="Enter Gallery name" autocomplete="off">
                    </div>
                     
                    <div class="form-group">
                        <label for="album">Album</label>
                        <select class="form-control {{($errors->has('album') ? " form-error" : "form-valid")}} " name="album" id="album">
                          <option value="" style="color:rebeccapurple"><b>Select Album</b></option>
                          @foreach($album as $album)
                        <option value="{{$album->id}}" @if($gallery->album_id==$album->id) Selected @endif >{{ucfirst($album->name)}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control {{($errors->has('category') ? " form-error" : "form-valid")}} " name="category" id="category">
                          <option value="" style="color:rebeccapurple"><b>Select Category</b></option>
                          @foreach($category as $category)
                          <option value="{{$category->id}}" @if($gallery->category_id==$category->id) Selected @endif>{{ucfirst($category->name)}}</option>
                            @endforeach
                          
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="subcategory">Sub Category</label>
                          <select class="form-control {{($errors->has('subcategory') ? " form-error" : "form-valid")}} " name="subcategory" id="subcategory">
                            <option value="" style="color:rebeccapurple"><b>Select SubCategory</b></option>
                            @foreach($subcategory as $subcategory)
                            <option value="{{$subcategory->id}}" @if($gallery->subcategory_id==$subcategory->id) Selected @endif>{{ucfirst($subcategory->name)}}</option>
                              @endforeach
                            
                          </select>
                        </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control {{($errors->first('description') ? " form-error" : "form-valid")}}" id="description" value="{{$gallery->description}}" name="description" placeholder="Enter Description" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for=""></label>
                      <input type="file" name="image" id="image" class="form-control" placeholder="" aria-describedby="helpId">
                      <img src="{{URL::asset('storage/uploads/gallery/thumbnails/'.$gallery->image)}}" class="img-circle thumbnail" alt="" width="20%">
                    </div>
                  </div>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                  </div>
                </form>
              </div>
              <!-- /.box -->
     
    
            
    
           
    
            </div>
            <!--/.col (left) -->
           
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      
    
@endsection
@push('js')
 
<script>
  $(document).ready(function () {
$('#album').on('change', function() {
  var album=$(this).val();
  $.ajax({
              type: "get",
              url: "/admin/gallery/getcategory",
              data:'album='+$(this).val(),
              success: function(data){
                if(data.error == true) {
                  var categoryNone = "";
                  toastr.error( data , "Album Dosen't have category please create and Album first" );
                  categoryNone += "<option value=''>Please Select Album First </option>";
                  $("#category").html(categoryNone).trigger('change.select2');
                  }else{
                    var category = "<option value=''>Select Category </option>";
                    category+=""
                  $.each(data, function(index, value) {

                    category += "<option value="+value.id+">"+value.name+" </option>";
                  });
                  $("#category").html(category).trigger('change.select2');
                  }
              }
        
          
          });



        
});

$('#category').on('change', function() {
  var category=$(this).val();
  $.ajax({
              type: "get",
              url: "/admin/gallery/getsubcategory",
              data:'category='+$(this).val(),
              success: function(data){
                if(data.error == true) {
                  var subcategoryNone = "";
                  toastr.error( data , "Category Dosen't have subcategory please create and subcaregory first" );
                  subcategoryNone += "<option value=''>Plese Select Category First </option>";
                  $("#subcategory").html(subcategoryNone).trigger('change.select2');
                  }else{
                    var subcategory = "";
                  $.each(data, function(index, value) {
                    subcategory += "<option value="+value.id+">"+value.name+" </option>";
                  });
                  $("#subcategory").html(subcategory).trigger('change.select2');
                  }
              }
        
          
          });



        
});
});



</script>
 
 
@endpush