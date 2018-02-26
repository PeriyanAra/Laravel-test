@extends('layouts.app')

@section('content')
	<a href="{{ url('admin/companies') }}" class="btn btn-primary btn-lg">Companies</a><br><br>

	<h3>{{ $name }}</h3>	
	<h5>{{ $email }}</h5>
	<h5>{{ $website }}</h5>

	<img src="{{ asset('storage/'.$logo) }}">
@endsection