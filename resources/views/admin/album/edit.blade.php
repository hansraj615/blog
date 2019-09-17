@extends('adminlte::page')

@section('title', 'Album Edit')
@push('css')
 
@endpush
@section('content')
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SubCategory Edit
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Album</a></li>
            <li class="active">Edit Album</li>
          </ol>
        </section>
       
        <!-- Main content -->
        <section class="content">
        <a href="{{route('album.index')}}"   class="btn btn-success align-right">All Albums</a>
            <br> <br>
          <div class="row">
            <!-- left column -->
            
            <div class="  col-md-6 ">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Album</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST"action="{{ route('album.update',$album->id) }}" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors dz-clickable">
                   
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  {{-- <input type="hidden"> --}}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="albumname" name="albumname" value="{{$album->name}}" placeholder="Enter Album Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" name="category" id="category">
                        <option value="" style="color:rebeccapurple"><b>Select Category</b></option>
                        @foreach($category as $category)
                      <option value="{{$category->id}}" @if($album->category_id==$category->id) Selected @endif>{{ucfirst($category->name)}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Sub Category</label>
                        <select class="form-control" name="subcategory" id="subcategory">
                          <option value="" style="color:rebeccapurple"><b>Select SubCategory</b></option>
                          @foreach($subcategory as $subcategory)
                        <option value="{{$subcategory->id}}" @if($album->subcategory_id==$subcategory->id) Selected @endif>{{ucfirst($subcategory->name)}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" id="description" name="description"  value="{{$album->description}}"placeholder="Enter Description" autocomplete="off">
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
@push('scripts')
 
 
 
 
@endpush