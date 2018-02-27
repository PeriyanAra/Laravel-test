@extends('layouts.app')

@section('content')
	<a href="{{ url('admin/companies') }}" class="btn btn-primary btn-lg">Companies</a><br><br>
	<h3>Edit page</h3>

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	
	<form method="POST" action="/admin/companies/{{$id}}" enctype="multipart/form-data">
		@csrf
		<input type="text" value=" {{$name}} " placeholder="name" name="name" class="form-group"><br>
		<input type="email" value=" {{$email}} " placeholder="email@example.com" name="email" class="form-group"><br>
		<input type="text" value=" {{$website}} " placeholder="www.example.com" name="website" class="form-group"><br>
		<img src="{{ asset('storage/'.$logo) }}">
		<input type="file" name="logo" id="logo" class="form-group">
		<br>
		<input type="hidden" name="_method" value="PUT">
		<input type="submit" value="Edit data" class="btn btn-warning">
	</form><br><br>

	@if (session('status'))
    
        {{ session('status') }}
    
	@endif
@endsection