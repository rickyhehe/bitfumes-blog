@extends('admin.layouts.main')

@section('content-title')
Create Tag
@endsection

@section('content-body')
<div class="card-box">
  @include('admin.partials.messages')
    <form role="form" action="@yield('form-action', route('admin.admin.store') )" method="POST">
      <div class="form-group">
        <label>Admin Name</label>
        <input type="text" class="form-control" id="name" name="name" value="@yield('name-value')">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" id="email" name="email" value="@yield('email-value')">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" value="@yield('password-value')">
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword">
      </div>
      <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control" id="">
          <option value="0">Writer</option>
          <option value="1">Editor</option>
          <option value="2">Publisher</option>
        </select>
      </div>
      {{ csrf_field() }}
      @yield('form-method')
      <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
    </form>
  </p>
  
  
</div>
@endsection
