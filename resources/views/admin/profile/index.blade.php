@extends('adminlte::page')

@section('title', 'Gallery')
@push('css')
@endpush
@section('content')

<section class="content">

    <div class="row">
     
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li><a href="#profile" data-toggle="tab">Profile</a></li>
            <li class="active"><a href="#password" data-toggle="tab" aria-expanded="true">Password</a></li>
          </ul>
          <div class="tab-content">
           
            <div class="tab-pane" id="profile">
              <!-- The timeline -->
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Naffffffffffme</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane active" id="password">
                <form class="form-horizontal" method="POST" action="{{route('profile.update')}}" enctype="multi/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="inputOldPassword" class="col-sm-2 control-label">Old Password</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputOldPassword" placeholder="Enter Old Password" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNewPassword" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputNewPassword" placeholder="Enter New Password" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Enter Confirm Password">
                  </div>
                </div>
               
                
               
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>

  @endsection
 
  @push('js')

@endpush
@yield('js')