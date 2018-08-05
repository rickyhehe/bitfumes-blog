@extends('admin.layouts.main')

@section('head')
    <link rel="stylesheet" href="{{ asset('adminox/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content-title')
    Posts data
@endsection

@section('content-body')
<div class="card-box table-responsive">
    @include('admin.partials.messages')
  @can('posts.create', Auth::user())
    <a href="{{ route('admin.post.create') }}" class="btn btn-info">Add New</a>
  @endcan  
    
  <hr>
  <table class="table table-striped table-bordered table-datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Status</th>
        <th>Posted By</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $loop->index +1 }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->status }}</td>
        <td>{{ $post->updated_by }}</td>
        <td>
          @can('posts.update', Auth::user())
            <a class="btn btn-success" href="{{ route("admin.post.edit",$post->id) }}">E</a>
          @endcan
          @can('posts.delete', Auth::user())
            <button value="{{ route('admin.post.destroy',$post->id) }}" class="btn btn-danger btn-modal-confirm">D</button>
          @endcan
          
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
  $('.table-datatable').DataTable()
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