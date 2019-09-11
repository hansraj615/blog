@extends('adminlte::page')

@section('title', 'Sub Category Create')
@push('css')

@endpush
@section('content')
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Sub Category Create
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Sub Category</a></li>
            <li class="active">Sub Create Category</li>
          </ol>
        </section>
       
        <!-- Main content -->
        <section class="content">
        <a href="{{route('subcategory.index')}}"   class="btn btn-success align-right">All Sub Category</a>
            <br> <br>
          <div class="row">
            <!-- left column -->
            
            <div class="  col-md-6 ">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Sub Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST"action="{{ route('subcategory.store') }}" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors dz-clickable">
                   
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group ">
                      <label for="subcategoryname">Name</label>
                    <input type="text" class="form-control is-valid {{($errors->first('subcategoryname') ? " form-error" : "form-valid")}}" id="subcategoryname" name="subcategoryname"  value="{{old('subcategoryname')}}" placeholder="Enter Sub Category" autocomplete="off">
                    </div>
                     
                      
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control {{($errors->has('category') ? " form-error" : "form-valid")}}" name="category" id="category">
                          <option value="" style="color:rebeccapurple"><b>Select Category</b></option>
                          @foreach($category as $category)
                        <option value="{{$category->id}}" @if( old('category')==$category->id)Selected @endif >{{ucfirst($category->name)}}</option>
                          @endforeach
                          
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
@push('scripts')
 
 
 
 
@endpush