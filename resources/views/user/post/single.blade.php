@extends('user.layouts.main')

@section('content-body')
<br>
<div class="container bg-muted">
  <h2>{{ $post->title }}</h2>
  <hr>
  <div class="row">
    <div class="col-md-8">
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
  
</div>
@endsection