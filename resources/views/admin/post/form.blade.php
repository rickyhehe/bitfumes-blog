@extends('admin.layouts.main')

@section('content-title')
Create Post
@endsection

@section('content-body')
<div class="card-box">
  <p class="text-muted m-b-20 font-13"></p>
    <form role="form" method="POST">
      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" id="postTitle" name="title" value="@yield('title-value')">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image">
      </div>
      <div class="form-group">
        <div class="checkbox checkbox-primary">
          <input id="postPublish" type="checkbox" name="publish">
          <label for="postPublish">
            Publish
          </label>
        </div>
      </div>
      
      <div class="form-group">
        <label for="checkbox1">
          Content Body
        </label>
        <textarea id="elm1" name="body" aria-hidden="true">
            @yield('body-value')
        </textarea>
        @yield('form-method')
      </div>
      <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
    </form>
  </p>
  
  
</div>
@endsection
@section('foot')
<script src="{{ asset('adminox/plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    tinymce.init({
      selector: "textarea#elm1",
      theme: "modern",
      height:300
    });
    
  });
</script>
@endsection