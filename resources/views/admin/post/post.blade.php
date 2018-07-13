@extends('admin.layouts.main')

@section('content-title')
Create Post
@endsection

@section('content-body')
<div class="card-box">
  <h4 class="header-title m-t-0">Create post</h4>
  <p class="text-muted m-b-20 font-13">
    <form role="form">
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
          <label for="checkbox1">
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
    if($("#elm1").length > 0){
      tinymce.init({
        selector: "textarea#elm1",
        theme: "modern",
        height:300,
        plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
      });
    }
  });
</script>
@endsection