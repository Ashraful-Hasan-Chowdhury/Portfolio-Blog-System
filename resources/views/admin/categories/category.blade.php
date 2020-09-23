@extends('multiauth::layouts.app')
@section('categoryActive', 'active')
@section('mainTitle', 'Create Category |')
@section('content')
<div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Categories</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="{{route('category.store')}}" method="post">
          @csrf
        <div class="card-body offset-3 col-md-6">
            <!-- Error handler -->
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                          <ul>
                              <li>{{ $error }}</li>
                          </ul>
                  </div>
                      @endforeach
              @endif
              <!-- Error Handler -->
          <div class="form-group">
            <label for="cname">Category Name</label>
            <input type="text" class="form-control" name="cname" id="cname" placeholder="Category Name">
          </div>
          <div class="form-group">
            <label for="cslug">Category Slug</label>
            <input type="text" name="cslug" class="form-control" id="cslug" placeholder="Category Slug">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>

          </div>
        </div>
      </form>
    </div>
</div>
@endsection
