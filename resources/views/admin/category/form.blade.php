@extends('admin.layouts.main')

@section('content-title')
Create Category
@endsection

@section('content-body')
<div class="card-box">
  @include('admin.partials.messages')
    <form action="@yield("form-action",route('admin.category.store'))" method="POST">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="categoryName" name="name" value="@yield('name-value')">
      </div>
      {{ csrf_field() }}
      @yield('form-method')
      <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
    </form>
  </p>
  
  
</div>
@endsection
