@extends('admin.post.form')

@section('content-title')
    Edit
@endsection

@section('form-action')
    {{ route("admin.post.update",$post->id) }}
@endsection

@section('form-method')
{{ method_field('put') }}
@endsection

@section('title-value')
{{ $post->title }}
@endsection

@section('status-value')
  @if ($post->status == 1)
      checked
  @endif
@endsection


@section('body-value')
    {{ $post->body }}
@endsection

