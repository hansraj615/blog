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
          <a href="{{route('role.index')}}"   class="btn btn-success align-right">All Role</a>
              <br> <br>
            <div class="row">
              <!-- left column -->
              
              <div class="  col-md-6 ">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Edit Role</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form method="POST"action="{{ route('role.update',$role->id) }}" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick add-professors dz-clickable">
                     
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                      <div class="form-group ">
                        <label for="rolename">Name</label>
                      <input type="text" class="form-control is-valid {{($errors->first('rolename') ? " form-error" : "form-valid")}}" id="rolename" name="rolename"  value="{{$role->name}}" placeholder="Enter Role Name" autocomplete="off">
                      </div>
                       
                      <div class="form-group">
                          <label for="displayname">Display Name</label>
                          <input type="text" class="form-control is-valid {{($errors->first('displayname') ? " form-error" : "form-valid")}}" id="rolename" name="displayname"  value="{{$role->display_name}}" placeholder="Enter Display Name" autocomplete="off">
                        </div>
                     
                        <div class="form-group">
                          <label for="description">Description</label>
                          <input type="text" class="form-control {{($errors->first('description') ? " form-error" : "form-valid")}}" id="description" value="{{$role->description}}" name="description" placeholder="Enter Description" autocomplete="off">
                      </div>
                        <div class="form-group">
                            <label for="permission">Permissions</label>
                            <select class="form-control" name="permission[]" multiple id="permission">
                              <option value="" style="color:rebeccapurple"><b>Select Permission</b></option>
                              @foreach($permissions as $permission)
                            <option value="{{$permission->id}}" @if(in_array($permission->id,$role_permissions)) selected @endif >{{ucfirst($permission->name)}}</option>
                              @endforeach
                              
                            </select>
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