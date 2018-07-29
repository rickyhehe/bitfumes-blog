@extends('admin.role.form')

@section('content-title')
    Edit
@endsection

@section('form-action')
  {{ route('admin.role.update',$role->id) }}
@endsection

@section('name-value')
  {{ $role->name }}
@endsection

@section('form-method')
  {{ method_field('put') }}
@endsection