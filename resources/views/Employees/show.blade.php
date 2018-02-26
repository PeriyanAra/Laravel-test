@extends('layouts.app')

@section('content')
	<a href="{{ url('admin/employees') }}" class="btn btn-primary btn-lg">Employees</a><br><br>

	<h3>{{ $name }}</h3><br>
	<h5>{{ $lastname }}</h5>
	<h5>{{ $company }}</h5>	
	<h5>{{ $email }}</h5>
	<h5>{{ $phone }}</h5>
@endsection