@extends('admin.category.form')

@section('content-title')
Edit    
@endsection

@section('name-value')
{{ $category->name }}
@endsection

@section('form-action')
{{ route('admin.category.update',$category->id) }}
@endsection

@section('form-method')
{{ method_field('put') }}
@endsection