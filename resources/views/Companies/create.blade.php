<!DOCTYPE html>
<html>
<head>
	<title>Companies</title>
</head>
<body>
	<form method="POST" action="/admin/companies/" enctype="multipart/form-data">
		@csrf
		<input type="text" placeholder="name" name="name"><br>
		<input type="email" placeholder="email@example.com" name="email"><br>
		<input type="text" placeholder="www.example.com" name="website"><br>
		<input type="file" name="logo" id="logo"><br>
		<input type="submit" value="Add data">
	</form>
</body>
</html>