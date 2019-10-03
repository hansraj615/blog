@extends('adminlte::page')

@section('title', 'Category')
@push('css')

@endpush
@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
      General Form Elements
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">General Elements</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">About</label>
                <textarea class="form-control" id="exampleInputEmail1" placeholder="Enter About Me" col="4" row="7"></textarea>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.box -->

        <!-- Form Element sizes -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Experiance | Happy Client | Project Clients(Event) </h3>
          </div>
          <div class="box-body">
            <div class="row">
                <div class="col-xs-3">
                    <label for="yojexperiance">Years Of Experience</label>
            <input class="form-control input-sm" type="number" name="yojexperiance" placeholder="Years Of Experience in Number">
                </div>
                <div class="col-xs-3">
                    <label for="happyclient">Happy Clients</label>
            <input class="form-control  input-sm" type="number" name="happyclient" placeholder="Happy Clients in Number">
                </div>
            <div class="col-xs-3">
                <label for="projectcompleted">Projects Completed</label>
            <input class="form-control input-sm" type="number" name="projectcompleted" placeholder="Projects Completed in Number">
        </div>
        
        </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box box-danger">
          <div class="box-header with-border">
          {{-- <a href="" class="box-title text-right btn btn-success">All Testimonial</a> --}}
          <div class="row">
              <div class="col-lg-8">
                    <h3 class="box-title">Testimonial</h3>
              </div>
              <div class="col-lg-4">
              <div class="btn btn-warning pull-right btn-sm"> <a href="{{route('testimonial.index')}}">All Testimonial</a> </div>

              </div>
          </div>
          </div>
          <div class="box-body">
          <form method="POST"action="{{route('testimonial.store')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control {{($errors->has('name') ? " form-error" : "form-valid")}}" id="name" name="name" placeholder="Enter Name" autocomplete="off">
            </div>
            <div class="form-group">
            <label for="company">Company</label>
            <input type="text" class="form-control {{($errors->has('company') ? " form-error" : "form-valid")}}" id="company" name="company" placeholder="Enter Company Name" autocomplete="off">
            </div>
            <div class="form-group">
            <label for="comment">Comment</label>
            <textarea type="text" class="form-control {{($errors->has('comment') ? " form-error" : "form-valid")}}" id="comment" name="comment" placeholder="Enter Comment" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
            <label for="image">Image</label>
            <div class="input-group">
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
                        
            </div>
             </div>
             <button type="submit" class="btn btn-success">Submit</button>
          </div>
          
        
      </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
 

      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">About Page Image</h3>
          </div>{{Auth::id()}}
          <!-- /.box-header -->
          <!-- form start -->
          <form method="POST"action="{{route('about.userprofileimage',Auth::id())}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
            <label for="image">Image</label>
            <div class="input-group">
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
                        
                </div>                                              
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Save</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box -->
       
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

@endsection

@push('js')
@endpush