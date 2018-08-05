@extends('admin.layouts.main')

@section('head')
<link rel="stylesheet" href="{{ asset('adminox/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content-title')
Admin data
@endsection

@section('content-body')
<div class="card-box">
  @include('admin.partials.messages')
  <a href="{{ route('admin.admin.create') }}" class="btn btn-info">Add New</a>
  
  <table class="table table-striped table-bordered table-datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($admins as $admin)
      <tr>
        <td>{{ $loop->index +1 }}</td>
        <td>{{ $admin->name }}</td>
        <td>{{ $admin->email }}</td>
        <td>
          @foreach ($admin->roles as $role)
              {{ $role->name }},
          @endforeach  
        </td>
        <td>
          <a class="btn btn-success" href="{{ route('admin.admin.edit',$admin->id) }}">E</a>  
          <button value="{{ route('admin.admin.destroy',$admin->id) }}" class="btn btn-danger btn-modal-confirm">D</button>  
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="modal fade modal-confirm show" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="mySmallModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure?</p>
        <form method="post" action="">
          {{ csrf_field() }}
          {{ method_field("delete") }}
        </form>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn">No</button>
        <button class="btn btn-danger">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
@endsection

@section('foot')
<script src="{{ asset('adminox/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminox/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
  $('.btn-modal-confirm').click(function () {
    var route = $(this).val()
    $('.modal-confirm').modal('show')
    $('.modal-confirm form').prop('action',route)
    $('.modal-confirm .btn-danger').click(function () {
      $('.modal-confirm form').submit()
    })
  })
  $('.table-datatable').DataTable()
</script>
@endsection