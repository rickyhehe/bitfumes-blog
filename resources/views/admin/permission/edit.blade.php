@extends('admin.permission.form')

@section('content-title')
    Edit
@endsection

@section('form-action')
  {{ route('admin.permission.update',$permission->id) }}
@endsection

@section('name-value')
  {{ $permission->name }}
@endsection

@section('form-method')
  {{ method_field('put') }}
@endsection