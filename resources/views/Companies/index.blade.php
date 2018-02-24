<!DOCTYPE html>
<html>
<head>
	<title>Companies</title>
</head>
<body>
	<h1>Companies list</h1><br>

	<a href="{{ url('admin/companies/create') }}">Add new companie</a><br><br>

	<table style="border: 1px solid black">
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
		<td><a href="/admin/companies/$companie->id/edit">Edit</a></td>
		<td>
			<form method="POST" action="/admin/companies/$companie->id">
HTML;
?>
				@csrf<?php
echo <<<HTML
				<input type="hidden" name="_method" value="DELETE">
				<input type="submit" value="Delete">
			</form>			
		</td>
	</tr>

HTML;
				}
			?>
		</tbody>
	</table>
</body>
</html>