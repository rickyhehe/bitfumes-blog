@extends('admin.layouts.main')

@section('content-title')
Create role
@endsection

@section('content-body')
<div class="card-box">
  @include('admin.partials.messages')
    <form role="form" action="@yield('form-action', route('admin.role.store') )" method="POST">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="roleName" name="name" value="@yield('name-value')">
      </div>
      <div class="form-group row">
        <div class="col-md-12">Permission</div>
        @foreach ($permissions as $perm)
        <div class="col-md-3" style="border-right: 1px gray solid">
            <input type="checkbox" name="role[]" value="{{ $perm->id }}">
            <label >
                {{ $perm->name }}
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
