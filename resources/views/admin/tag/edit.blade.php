@extends('admin.tag.form')

@section('content-title')
    Edit
@endsection

@section('form-action')
  {{ route('admin.tag.update',$tag->id) }}
@endsection

@section('name-value')
  {{ $tag->name }}
@endsection

@section('form-method')
  {{ method_field('put') }}
@endsection