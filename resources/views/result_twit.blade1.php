<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
</head>
<body>

@foreach($tweetarray as $twit)
    {{ $twit->text }}<br>
@endforeach

</body>
</html>