@extends('layouts.app')

@section('content')
	<h1>Companies list</h1><br>

	<a href="{{ url('admin/companies/create') }}" class="btn btn-primary btn-lg">Add new companie</a><br><br>

	<table class="table table-striped">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Website</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		<tbody>
			<?php
				foreach ($companies as $companie) {
echo <<<HTML

	<tr>
		<td><a href="/admin/companies/$companie->id">$companie->name</a></td>
		<td>$companie->email</td>
		<td>$companie->website</td>
		<td><a href="/admin/companies/$companie->id/edit" class="btn btn-warning">Edit</a></td>
		<td>
			<form method="POST" action="/admin/companies/$companie->id">
HTML;
?>
				@csrf<?php
echo <<<HTML
				<input type="hidden" name="_method" value="DELETE">
				<input type="submit" value="Delete" class="btn btn-warning">
			</form>			
		</td>
	</tr>

HTML;
				}
			?>
		</tbody>
	</table>

	{{ $companies->links() }}
@endsection