<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title></title>
</head>
<body>
<form action="{{ route('search') }}" method="POST">
    <p><input type="text" name="name" placeholder="Ім'я"></p>
    <p><input type="text" name="page" placeholder="Сторінка"></p>
    <p><input type="submit"></p>
    {{ csrf_field() }}
</form>

</body>
</html>