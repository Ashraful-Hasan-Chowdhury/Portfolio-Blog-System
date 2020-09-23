@extends('multiauth::layouts.app')
@section('postActive', 'active')
@section('mainTitle', 'All Posts |')
@section('content')
<div class="card">
  <div class="card-header">
    <h2 class="card-title">Blog Posts</h2>
    @admin('creator,super')
    <a class="offset-5 btn btn-success" href="{{route('post.create')}}">Add New</a>
    @endadmin
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>SL</th>
          <th>Title</th>
          <th>Clicked</th>
          <th>Created at</th>
          <th>Status</th>
          <th>Edit</th>
          @admin('creator,editor,super')
          <th>Delete</th>
          @endadmin
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $row)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$row->title}}</td>
          <td class="text-center">{{$row->counter}}</td>
          <td>{{$row->created_at}}</td>
          <td>

            @if ($row->status == 1)
            <small class="badge-success badge-pill"><strong>Published</strong></small>
            @else
            <small class="badge-danger badge-pill"><strong>Unpublished</strong></small>
            @endif

          </td> 
          <td><a href="{{route('post.edit',$row->id)}}"><i class="fas fa-edit ml-3"></i></a></td>
          <form action="{{route('post.destroy',$row->id)}}" id="delete-form-{{$row->id}}" method="post">
            @csrf
            @method('Delete')
            @admin('creator,editor,super')
            <td><a id="del" href=""><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
            @endadmin
          </form>
        </tr>
        <script>
          $(document).on("click","#del",function(e){
              e.preventDefault();
              Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{$row->id}}').submit();
                }
              })
              });

        </script>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>SL</th>
          <th>Title</th>
          <th>Clicked</th>
          <th>Created at</th>
          <th>Status</th>
          <th>Edit</th>
          @admin('creator,editor,super')
          <th>Delete</th>
          @endadmin
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection