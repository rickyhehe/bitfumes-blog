@extends('admin.layouts.main')

@section('head')
    <link rel="stylesheet" href="{{ asset('adminox/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content-title')
    Posts data
@endsection

@section('content-body')
<div class="card-box table-responsive">
  <p class="text-muted m-b-20 font-13"></p>
  <a href="{{ route('admin.post.create') }}" class="btn btn-info">Add New</a>
  <hr>
  <table class="table table-striped table-bordered table-datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Status</th>
        <th>Posted By</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $loop->index +1 }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->status }}</td>
        <td>{{ $post->posted_by }}</td>
        <td>{{ $post->created_by }}</td>
        <td>{{ $post->updated_by }}</td>
        <td>
          <button class="btn btn-success">E</button>
          <button class="btn btn-danger">D</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@section('foot')
<script src="{{ asset('adminox/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminox/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
  $('.table-datatable').DataTable()
</script>
@endsection