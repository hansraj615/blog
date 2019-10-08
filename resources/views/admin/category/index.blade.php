@extends('adminlte::page')

@section('title', 'Category')
@push('css')

@endpush
@section('content')
 
<section class="content">
  <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-center">Categories</h3>
            </div>
            <div class="text-right">
            <a href="{{ route('category.create') }}" class="btn btn-success">Add New</a>
            </div>
            <br>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table id="table" class="table table-hover">
                <thead class="danger">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Description</th>
                  <th>Cteated At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $key =>$value)
                 <tr>
                    {{-- <td>{{$category->firstItem() + $key}}</td> --}}
                        <td>{{ $key+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->slug}}</td>
                        <td>{{$value->description}}</td>
                        <td>{{$value->created_at->diffForHumans()}}</td>
                        <td>{{$value->updated_at->diffForHumans()}}</td>
                        <td><div class="btn-group btn-group-sm">
                                
                            <a href="{{ route('category.edit',$value->id) }}" class="edit-model btn btn-warning btn-sm " >
                                <i class="fa fa-edit"></i>
                                </a>
                                <button class="delete-model btn btn-danger btn-sm " type="button" onclick="deleteCategory({{ $value->id }})">
                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                  <form id="delete-form-{{ $value->id }}" action="{{ route('category.destroy',$value->id) }}" method="POST" style="display: none;">
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
 
 <script>
  

$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
<script type="text/javascript">
  function deleteCategory(id) {
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