<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
</head>
<body>
<form action="{{ route('user') }}" method="POST">
		<!--<span style="padding-left: 20%;" class="letter">Ваше полное имя:<span style="padding-left: 20%;">-->
		<p><input type="text" name="name"></p>
		<p><input type="submit"></p>
		{{ csrf_field() }}
</form>

</body>
</html>