@extends('multiauth::layouts.app')
@section('postActive', 'active')
@section('mainTitle', 'Create Post |')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>New Blog</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('post.index')}}">All Posts</a></li>
          <li class="breadcrumb-item active">Create Post</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <span class="card-title">Write your blog post here</span>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body">
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
      <form role="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="PostTitle" placeholder="Post Title">
              </div>
              <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Post Subtitle">
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" id="PostSlug" placeholder="Post Slug">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputFile">Blog Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                  </div>

                </div>
              </div>

              <div class="form-group">
                <label>Select tags</label>
                <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Tags" style="width: 100%;">
                  @foreach($tags as $tag)
                  <option value="{{$tag->id}}">{{$tag->tname}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Select Categories</label>
                <select class="select2" name="categories[]" multiple="multiple" data-placeholder="Categories"
                  style="width: 100%;">
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->cname}}</option>
                  @endforeach
                </select>
              </div>

              @admin('publisher,super')
              <div class="form-check ">
                <input type="checkbox" name="status" value="1" class="form-check-input" id="publish">
                <label class="form-check-label" for="publish">publish</label>
              </div>
              @endadmin
            </div>
          </div>




          <div class="form-group card-body">
            <label for="editor">Post Body</label>
            <textarea name="body" id="editor"></textarea>

          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{route('post.index')}}" class="btn btn-warning">Back</a>

        </div>
      </form>

    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
  </div>

</section>

<script>
  CKEDITOR.replace('editor', {
     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
     filebrowserUploadMethod: 'form'

 })
 CKEDITOR.config.height = 500;

</script>

<script src="{{asset('public/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function () {
  bsCustomFileInput.init();
  $('.select2').select2();

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
});
});
</script>
@endsection