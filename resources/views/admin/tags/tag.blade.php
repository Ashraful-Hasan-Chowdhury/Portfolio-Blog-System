@extends('multiauth::layouts.app')
@section('TagActive', 'active')
@section('mainTitle', 'Create Tag |')
@section('content')
<div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tags</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="{{route('tag.store')}}" method="post">
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
            <label for="tname">Tag Name</label>
            <input type="text" class="form-control" name="tname" id="tname" placeholder="Tag Name">
          </div>
          <div class="form-group">
            <label for="tslug">Tag Slug</label>
            <input type="text" name="tslug" class="form-control" id="tslug" placeholder="Tag Slug">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('tag.index')}}" class="btn btn-warning">Back</a>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection
