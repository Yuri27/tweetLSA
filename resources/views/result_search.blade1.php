<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title></title>
</head>
<body>
<?php setlocale(LC_ALL, 'Ukrainian');
    $months = array('January', 'February', 'March', 'April',
    'May', 'June', 'July', 'August',
    'September', 'October', 'November', 'December');
    $new_months = array('Января', 'Февраля','Марта', 'Апреля',
    'Мая', 'Июня', 'Июля', 'Августа',
    'Сентября', 'Октября', 'Ноября', 'Декабря');
?>
@foreach($resarray as $res)
    Ім'я: {{ $res->name }}<br>
    Логін: <a href="#" >{{ $res->screen_name }}</a><br>

    Місто: {{ $res->location }}<br>
    Статус: {{ $res->description }}<br>
    Web сайт: {{ $res->url }}<br>
    Дата створення: {{date('d F Y H:i:s', strtotime($res->created_at))}}<br>
    <img src="{{  str_replace("normal", "200x200", $res->profile_image_url) }}" alt=""><br><br>
    <form action="{{ route('user') }}" method="POST" id="myform">
        <input type="hidden" name="name" value="{{$res->screen_name}}">
        <button type="submit">Переглянути твіти</button>
        {{--<a href="#" onClick="document.getElementById('myform').submit(); return false;">{{$res->screen_name}}</a>--}}
        {{--<a href="#" onclick="document.getElementById('myform').submit()">{{$res->screen_name}}</a>--}}
        {{ csrf_field() }}
    </form>
    <form action="{{ route('favorite_post') }}" method="POST" id="myform">
        <input type="hidden" name="name" value="{{$res->screen_name}}">
        <button type="submit">Що сподобалось</button>
        {{ csrf_field() }}
    </form>
@endforeach

</body>
</html>