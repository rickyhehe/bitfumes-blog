@extends('admin.layouts.main')
@section('head')
<link rel="stylesheet" href="{{ asset('adminox/plugins/select2/css/select2.min.css') }}"> 
@endsection
@section('content-title')
Create Post
@endsection

@section('content-body')
<div class="card-box">
  @include('admin.partials.messages')
    <form method="post" action="@yield("form-action",route('admin.post.store'))">
      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" id="postTitle" name="title" value="@yield('title-value')">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image">
      </div>

      <div class="form-group">
          <label>Category</label>
          <select class="form-control" name="category">
            @foreach ($categories as $category)
              @if (isset($post->category_id) )
                <option value="{{ $category->id }}" 
                @if ($category->id == $post->category_id) selected  @endif>
                {{ $category->name }}</option>
              @else
                <option value="{{ $category->id }}" >{{ $category->name }}</option>   
              @endif
              
            @endforeach
        </select>
      </div>

      <div class="form-group">
          <label>Tag</label>
          <select class="select2 form-control select2-multiple select2-hidden-accessible" multiple="" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true" name="tags[]">
            @foreach ($tags as $tag)
              @if (isset($post) )
              <option value="{{ $tag->id }}" 
                @foreach ($post->tags as $postTag)
                  @if ($tag->id == $postTag->id) selected  @endif
                  
                @endforeach
              >{{ $tag->name }}
              </option>
              @else
                <option value="{{ $tag->id }}" >{{ $tag->name }}</option>   
              @endif
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <div class="checkbox checkbox-primary">
          <input id="postStatus" type="checkbox" name="status" value="1" @yield("status-value")>
          <label for="postStatus">
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
        {{ csrf_field() }}
        @yield('form-method')
      </div>
      <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
    </form>
  </p>
  
  
</div>
@endsection
@section('foot')
<script src="{{ asset('adminox/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('adminox/plugins/select2/js/select2.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('.select2-multiple').select2();

    tinymce.init({
      selector: "textarea#elm1",
      theme: "modern",
      height:300
    });
    
  });
</script>
@endsection