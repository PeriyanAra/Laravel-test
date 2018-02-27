@extends('layouts.app')

@section('content')
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form method="POST" action="/admin/companies/" enctype="multipart/form-data">
		@csrf
		<input type="text" placeholder="name" name="name" class="form-group"><br>
		<input type="email" placeholder="email@example.com" name="email" class="form-group"><br>
		<input type="text" placeholder="www.example.com" name="website" class="form-group"><br>
		<input type="file" name="logo" id="logo" class="form-group"><br>
		<input type="submit" value="Add data" class="btn btn-warning">
	</form>
@endsection
