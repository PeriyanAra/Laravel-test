<!DOCTYPE html>
<html>
<head>
	<title>Companies</title>
</head>
<body>
	<a href="{{ url('admin/companies') }}">Companies</a><br><br>
	<h3>Edit page</h3>
	<form method="POST" action="/admin/companies/{{$companie[0]->id}}">
		@csrf
		<input type="text" value=" {{$companie[0]->name}} " placeholder="name" name="name"><br>
		<input type="email" value=" {{$companie[0]->email}} " placeholder="email@example.com" name="email"><br>
		<input type="text" value=" {{$companie[0]->website}} " placeholder="www.example.com" name="website"><br>
		<input type="hidden" name="_method" value="PUT">
		<input type="submit" value="Edit data">
	</form><br><br>

	@if (session('status'))
    
        {{ session('status') }}
    
	@endif
</body>
</html>