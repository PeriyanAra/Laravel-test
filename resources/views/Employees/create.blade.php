@extends('layouts.app')

@section('content')
	<form method="POST" action="/admin/employees/" enctype="multipart/form-data">
		@csrf
		<input type="text" placeholder="name" name="name" class="form-group"><br>
		<input type="text" placeholder="lastname" name="lastname" class="form-group"><br>
		<select name="company" class="form-group custom-select custom-select-sm">
		  @foreach($companies_list as $company)
		  	<option value="{{ $company->id }}">{{ $company->name }}</option>
		  @endforeach
		</select><br>
		<input type="email" placeholder="email@example.com" name="email" class="form-group"><br>
		<input type="text" placeholder="090-00-00-00" name="phone" class="form-group"><br>		
		<input type="submit" value="Add data" class="btn btn-warning">
	</form>
@endsection