@extends('admin.layouts.main')

@section('content-title')
Create permission
@endsection

@section('content-body')
<div class="card-box">
  @include('admin.partials.messages')
    <form permission="form" action="@yield('form-action', route('admin.permission.store') )" method="POST">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="permissionName" name="name" value="@yield('name-value')">
      </div>
      <div class="form-group">
        <label>Permission for</label>
        <select name="for" class="form-control">
          
          @if (isset($permission->for))
          <option disabled>Select Permission For</option>
          <option value="post" {{ $permission->for == 'post' ? "selected" : ""}} >Post</option>
          <option value="user"  {{ $permission->for == 'user' ? "selected" : ""}} >User</option>
          <option value="other"  {{ $permission->for == 'other' ? "selected" : ""}} >Other</option> 
          @else
          <option selected disabled>Select Permission For</option>
          <option value="post">Post</option>
          <option value="user">User</option>
          <option value="other">Other</option>
          @endif
        </select>
      </div>
      {{ csrf_field() }}
      @yield('form-method')
      <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
    </form>
  </p>
  
  
</div>
@endsection
