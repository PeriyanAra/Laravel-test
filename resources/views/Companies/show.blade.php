<!DOCTYPE html>
<html>
<head>
	<title>Companies</title>
</head>
<body>
	<a href="{{ url('admin/companies') }}">Companies</a><br><br>

	<h3>{{$companie[0]->name}}</h3>	
	<h5>{{$companie[0]->email}}</h5>
	<h5>{{$companie[0]->website}}</h5>
</body>
</html>