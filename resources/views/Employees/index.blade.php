@extends('layouts.app')

@section('content')
	<h1>Employees list</h1><br>

	<a href="{{ url('admin/employees/create') }}" class="btn btn-primary btn-lg">Add new employee</a><br><br>

	<table class="table table-striped">
		<thead>
			<th>Name</th>
			<th>Lastname</th>
			<th>Companie</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		<tbody>
				@foreach($employees as $employee)

				 

					<tr>
						<td><a href="{{ url('/admin/employees/'.$employee->id)}}">{{$employee->name}}</a></td>
						<td>{{ $employee->lastname }}</td>
						<td><a href="{{ url('admin/companies/'.$employee->company->id) }}">{{ $employee->company->name}}</a></td>
						<td>{{$employee->email}}</td>
						<td>{{$employee->phone}}</td>
						<td><a href="{{ url('/admin/employees/'.$employee->id.'/edit') }}" class="btn btn-warning">Edit</a></td>
						<td>
							<form method="POST" action="{{ url('/admin/employees/'.$employee->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<input type="submit" value="Delete" class="btn btn-warning">
							</form>			
						</td>
					</tr>

			@endforeach	
			
		</tbody>
	</table><br>

	{{ $employees->links() }}
@endsection