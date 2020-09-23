@extends('multiauth::layouts.app')
@section('tagActive', 'active')
@section('mainTitle', 'All Tags |')
@section('content')
<div class="card">
  <div class="card-header">
    <h2 class="card-title">Tags</h2>
    <a class="offset-5 btn btn-success" href="{{route('tag.create')}}">Add New</a>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>SL</th>
        <th>Tag Name</th>
        <th>Slug</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </thead>
      <tbody>
          @foreach($tags as $row)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$row->tname}}</td>
        <td>{{$row->tslug}}</td>
        <td ><a href="{{route('tag.edit',$row->id)}}"><i class="fas fa-edit ml-3"></i></a></td>
        <form action="{{route('tag.destroy',$row->id)}}" id="delete-form-{{$row->id}}" method="post" >
            @csrf
            @method('Delete')
            <td ><a id="del" href="" ><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
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

      </tr>
        @endforeach
      </tbody>
      <tfoot>
          <tr>
            <th>SL</th>
            <th>Tag Name</th>
            <th>Slug</th>
            <th>Edit</th>
            <th>Delete</th>
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
