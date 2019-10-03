@extends('adminlte::page')

@section('title', 'Testimonial')
@push('css')
 
<link href="{{asset('css/jquery.magnify.css')}}" rel="stylesheet">
<style>
  .magnify-modal {
    box-shadow: 0 0 6px 2px rgba(0, 0, 0, 0.3);
  }

  .magnify-header .magnify-toolbar {
    background-color: rgba(0, 0, 0, .5);
  }

  .magnify-stage {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    border-width: 0;
  }

  .magnify-footer .magnify-toolbar {
    background-color: rgba(0, 0, 0, .5);
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }

  .magnify-header,
  .magnify-footer {
    pointer-events: none;
  }

  .magnify-button {
    pointer-events: auto;
  }

  </style>
@endpush
@section('content')
 
<section class="content">
  <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-center">Testimonial</h3>
            </div>
            <div class="text-right">
            <a href="{{ route('testimonial.create') }}" class="btn btn-success">Add New</a>
            </div>
            <br>

            <!-- /.card-header -->
            <div class="  card-body table-responsive p-0">
              <table id="table" class="table table-striped table-bordered wrap" style="width:100%">
                <thead class="danger">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Comment</th>
                  <th>Image</th>
                  <th>Cteated At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testimonial as $key =>$value)
                 <tr>
                    {{-- <td>{{$category->firstItem() + $key}}</td> --}}
                        <td>{{ $key+1}}</td>
                        <td>{{$value->name??""}}</td>
                        <td>{{$value->company??""}}</td>
                        <td>{{$value->comment??""}}</td>
                        <td width="8%"> 
                          <div class="image-set">
                            <a data-magnify="gallery" data-caption="" href="{{URL::asset('storage/uploads/testimonial/thumbnails/'.$value->image)}}">
                              <img src="{{URL::asset('storage/uploads/testimonial/thumbnails/'.$value->image)}}" class="img-circle thumbnail" alt="" width="50%">
                            </a>
                          </div>
                  
                        </td>
                        <td>{{$value->created_at->diffForHumans()??""}}</td>
                        <td>{{$value->updated_at->diffForHumans()??""}}</td>
                        <td><div class="btn-group btn-group-sm">
                                
                            <a href="{{ route('testimonial.edit',$value->id) }}" class="edit-model btn btn-warning btn-sm " >
                                <i class="fa fa-edit"></i>
                                </a>
                                <button class="delete-model btn btn-danger btn-sm " type="button" onclick="deleteTestimonial({{ $value->id }})">
                                        <i class="fa fa-trash"></i>
                                                                      </button>
                                                                      <form id="delete-form-{{ $value->id }}" action="{{ route('testimonial.destroy',$value->id) }}" method="POST" style="display: none;">
                                                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                      </form>
                            </div>
                        </td>
                   
                 </tr>
                 @endforeach
                </tbody>
        
              </table>
            
            </div>
            {{-- <div class="text-right">  {{ $category->links() }}</div> --}}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <!-- /.row -->
  </section>
 
@endsection
 
@push('js')
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/jquery.magnify.js')}}"></script>
<script>
$('[data-magnify]').magnify({
  headToolbar: [
    'close'
  ],
  footToolbar: [
    'zoomIn',
    'zoomOut',
    'prev',
    'fullscreen',
    'next',
    'actualSize',
    'rotateRight'
  ],
  title: false
});

</script>
 <script>
  

$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
<script type="text/javascript">
  function deleteTestimonial(id) {
   const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    event.preventDefault();
      document.getElementById('delete-form-'+id).submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
  }</script>

@endpush
@yield('js')