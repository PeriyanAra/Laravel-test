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
		</thead>
		<tbody>
			<?php
				foreach ($companies as $companie) {
				  echo "<tr>";
				  	echo "<td>".$companie->name."</td>"."<td>".$companie->email."</td>"."<td>".$companie->website."</td>";
				  echo "</tr>";
				}
			?>
		</tbody>
	</table>
</body>
</html>