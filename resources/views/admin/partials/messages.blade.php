@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif

@if (session('messages'))
	<div class="alert alert-success">
		{{session()->get('messages')}}
	</div><!-- /.alert alert-success -->
@endif
