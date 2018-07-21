@extends('user.layouts.main')

@section('content-body')
<br>
<div class="container">
  <h2>Posts</h2>
  <hr>
  @foreach ($posts as $post)
  <div class="row">
    <div class="col-md-8">
      <h4><a href="{{ route('post.single',$post->slug) }}" class="text-muted">{{ $post->title }}</a></h4>
      <span>in <b>{{ ($post->category !=  null ) ? "{$post->category->name}" : "not set" }}</b></span>
      <small>{{ $post->created_at->diffForHumans() }}</small>
      <p>
        {{ $post->body }}
      </p>
      @foreach ($post->tags as $tag)
        <span class="badge badge-secondary">{{ $tag->name }}</span>
      @endforeach
    </div>
  </div>    
  
  <hr>
  @endforeach
  {{ $posts->links() }}
</div>
@endsection