@extends('adminlte::page')

@section('title', 'Category Edit')
@push('css')
 
@endpush
@section('content')
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Category Edit
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Edit Category</li>
          </ol>
        </section>
       
        <!-- Main content -->
        <section class="content">
        <a href="{{route('category.index')}}"   class="btn btn-success align-right">All Category</a>
            <br> <br>
          <div class="row">
            <!-- left column -->
            
            <div class="  col-md-6 ">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST"action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors dz-clickable">
                   
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="categoryname" name="categoryname" value="{{$category->name}}" placeholder="Enter Category" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" id="description" name="description"  value="{{$category->description}}"placeholder="Enter Description" autocomplete="off">
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