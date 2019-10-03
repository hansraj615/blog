@extends('adminlte::page')

@section('title', 'Album Create')
@push('css')

@endpush
@section('content')
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Album Create
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Album</a></li>
            <li class="active">Sub Create Album</li>
          </ol>
        </section>
       
        <!-- Main content -->
        <section class="content">
        <a href="{{route('album.index')}}"   class="btn btn-success align-right">All Album</a>
            <br> <br>
          <div class="row">
            <!-- left column -->
            
            <div class="  col-md-6 ">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Album</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST"action="{{ route('album.store') }}" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors dz-clickable">
                   
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group ">
                      <label for="albumname">Name</label>
                    <input type="text" class="form-control is-valid {{($errors->first('albumname') ? " form-error" : "form-valid")}}" id="albumname" name="albumname"  value="{{old('albumname')}}" placeholder="Enter Sub Category" autocomplete="off">
                    </div>
                     
                      
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control {{($errors->has('category') ? " form-error" : "form-valid")}} " name="category" id="category">
                          <option value="" style="color:rebeccapurple"><b>Select Category</b></option>
                          @foreach($category as $category)
                        <option value="{{$category->id}}"  >{{ucfirst($category->name)}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="subcategory">Sub Category</label>
                          <select class="form-control {{($errors->has('subcategory') ? " form-error" : "form-valid")}} " name="subcategory" id="subcategory">
                            <option value="" style="color:rebeccapurple"><b>Select SubCategory</b></option>
                            {{-- @foreach($subcategory as $subcategory)
                          <option value="{{$subcategory->id}}" @if( old('subcategory')==$subcategory->id)Selected @endif >{{ucfirst($subcategory->name)}}</option>
                            @endforeach --}}
                            
                          </select>
                        </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control {{($errors->first('description') ? " form-error" : "form-valid")}}" id="description" value="{{old('description')}}" name="description" placeholder="Enter Description" autocomplete="off">
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
  $('#category').on('change', function() {
    var category=$(this).val();
    $.ajax({
                type: "get",
                url: "/admin/album/getsubcategory",
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