@extends('admin.layouts.main')

@section('content-title')
Create Tag
@endsection

@section('content-body')
<div class="card-box">
  <p class="text-muted m-b-20 font-13"></p>
    <form role="form">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="tagName" name="name" value="@yield('name-value')">
      </div>
      @yield('form-method')
      <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
    </form>
  </p>
  
  
</div>
@endsection
