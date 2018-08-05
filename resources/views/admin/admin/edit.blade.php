@extends('admin.admin.form')

@section('content-title')
    Edit Admin
@endsection

@section('form-action')
  {{ route('admin.admin.update',$admin->id) }}
@endsection

@section('name-value')
{{ $admin->name }}
@endsection

@section('email-value')
{{ $admin->email }}
@endsection

@section('form-method')
  {{ method_field('put') }}
@endsection