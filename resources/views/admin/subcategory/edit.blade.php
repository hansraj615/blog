@extends('adminlte::page')

@section('title', 'Category Edit')
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
            <li><a href="#">SubCategory</a></li>
            <li class="active">Edit SubCategory</li>
          </ol>
        </section>
       
        <!-- Main content -->
        <section class="content">
        <a href="{{route('subcategory.index')}}"   class="btn btn-success align-right">All SubCategory</a>
            <br> <br>
          <div class="row">
            <!-- left column -->
            
            <div class="  col-md-6 ">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Subcategory</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST"action="{{ route('subcategory.update',$subcategory->id) }}" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors dz-clickable">
                   
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  {{-- <input type="hidden"> --}}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="subcategoryname" name="subcategoryname" value="{{$subcategory->name}}" placeholder="Enter Category" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" name="category" id="category">
                        <option value="" style="color:rebeccapurple"><b>Select Category</b></option>
                        @foreach($category as $category)
                      <option value="{{$category->id}}" @if($subcategory->category_id==$category->id) Selected @endif>{{ucfirst($category->name)}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" id="description" name="description"  value="{{$subcategory->description}}"placeholder="Enter Description" autocomplete="off">
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