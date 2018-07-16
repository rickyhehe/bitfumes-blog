@extends('admin.layouts.main')

@section('head')
<link rel="stylesheet" href="{{ asset('adminox/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content-title')
    Tag data
@endsection

@section('content-body')
<div class="card-box">
  @include('admin.partials.messages')
  <a href="{{ route('admin.tag.create') }}" class="btn btn-info">Add New</a>

  <table class="table table-striped table-bordered table-datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tags as $tag)
        <tr>
          <td>{{ $loop->index +1 }}</td>
          <td>{{ $tag->name }}</td>
          <td>
            <a href="#" class="btn btn-success">E</a>  
            <a href="#" class="btn btn-danger">D</a>  
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