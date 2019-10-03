@extends('adminlte::page')

@section('title', 'Testimonial')
@push('css')

@endpush
@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
                <h1>
                        Testimonial Add
                  <small>Preview</small>
                </h1>
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Testimonial</a></li>
                  <li class="active">Add Testimonial</li>
                </ol>
              </section>
             
              <!-- Main content -->
              <section class="content">
              <a href="{{route('testimonial.index')}}"   class="btn btn-success align-right">All Testimonial</a>
                  <br> <br>
                <div class="row">
                  <!-- left column -->
                  
                  <div class="  col-md-6 ">
                    <!-- general form elements -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Edit Testimonial</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form method="POST"action="{{ route('testimonial.store') }}" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors dz-clickable">
                         
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body">
                          <div class="form-group ">
                            <label for="name">Name</label>
                          <input type="text" class="form-control is-valid {{($errors->first('name') ? " form-error" : "form-valid")}}" id="name" name="name"  value="" placeholder="Enter Testimonial name" autocomplete="off">
                          </div>
                          <div class="form-group ">
                            <label for="company">Company</label>
                            <input type="text" class="form-control is-valid {{($errors->first('name') ? " form-error" : "form-valid")}}" id="name" name="company"  value="" placeholder="Enter Testimonial Company" autocomplete="off">
                            </div>
                            <div class="form-group ">
                                <label for="company">Comment</label>
                                <input type="text" class="form-control is-valid {{($errors->first('name') ? " form-error" : "form-valid")}}" id="name" name="comment"  value="" placeholder="Enter Testimonial Comment" autocomplete="off">
                            </div>
                          <div class="form-group">
                            <label for=""></label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="" aria-describedby="helpId">
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
@endpush