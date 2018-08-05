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
        <input type="email" class="form-control" id="email" name="email" value="@yield('email-value')" 
        @if (isset($admin))
            readonly
        @endif>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" value="@yield('password-value')"
        @if (!isset($admin))
            disabled placeholder="password will be same as email"
        @endif>
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="password_confirmation"
        @if (!isset($admin))
            disabled placeholder="password will be same as email"
        @endif>
      </div>
      <div class="form-group">
        <div class="checkbox checkbox-primary">
          <input id="adminStatus" type="checkbox" name="status" value="1" @yield("status-value")
          @if (isset($admin))
              @if ($admin->status == 1)
                  checked
              @endif
          @endif>
          <label for="adminStatus">
            Active
          </label>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-12">Assign Role</label>
        @foreach ($roles as $role)
          <div class="col-md-3">
              <input type="checkbox" name="role[]" value="{{ $role->id }}"
              @if (isset($admin))
                @foreach ($admin->roles as $adminrole)
                  @if ($role->id == $adminrole->id )
                      checked
                  @endif
                @endforeach
              @endif>
              <label >
                  {{ $role->name }}
              </label>
          </div>
        @endforeach
        
      </div>
      {{ csrf_field() }}
      @yield('form-method')
      <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
    </form>
  </p>
  
  
</div>
@endsection
