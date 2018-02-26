@extends('layouts.app')

@section('content')
	<a href="{{ url('admin/employees') }}" class="btn btn-primary btn-lg">Employees</a><br><br>
	<h3>Edit page</h3>
	<form method="POST" action="/admin/employees/{{$id}}">
		@csrf
		<input type="text" value=" {{$name}} " placeholder="name" name="name" class="form-group"><br>
		<input type="text" value=" {{$lastname}} " placeholder="lastname" name="lastname" class="form-group"><br>
		
		<select name="company" class="form-group custom-select custom-select-sm">
		  @foreach($companies_list as $company)
		  	<option value="{{ $company->id }}" {{ $company_selected == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
		  @endforeach
		</select><br>
		<input type="email" value=" {{$email}} " placeholder="email@example.com" name="email" class="form-group"><br>
		<input type="text" value=" {{$phone}} " placeholder="000-000-000" name="phone" class="form-group"><br>
		<input type="hidden" name="_method" value="PUT">
		<input type="submit" value="Edit data" class="btn btn-warning">
	</form><br><br>

	@if (session('status'))
    
        {{ session('status') }}
    
	@endif
@endsection