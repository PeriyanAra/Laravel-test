@extends('layouts.app')

@section('content')
<div class="row justify-content-around">
	<a href="{{ url('admin/companies') }}" class="col-4 link btn btn-primary btn-lg">Companies</a><br><br>
	<a href="{{ url('admin/employees') }}" class="col-4 link btn btn-primary btn-lg">Employees</a><br><br>
</div>
@endsection
	
