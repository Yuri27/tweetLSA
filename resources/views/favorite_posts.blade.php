
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title></title>
</head>
<body>
@foreach($posts as $res)
    <br>Текст: {{ $res->text }}<br>
    {{--Логин: <a href="#" >{{ $res->screen_name }}</a><br>--}}

    Лайків: {{ $res->favorite_count }}<br>
    {{--Геолокація: {{ $res->geo }}<br>--}}
    {{--Місто: {{ $res->place }}<br>--}}
    Твіт користувача: {{$res->user->name}}<br>
    Дата створення: {{date('d F Y H:i:s', strtotime($res->created_at))}}<br>
{{--    {{  dump($res->entities->geo) }}--}}
    {{--{{  dump($res->entities->media[0]->media_url) }}--}}
    {{--@if ($res->entities.length == 0)--}}
        {{--<img src="{{$res->entities->media[0]->media_url}}" alt="" width="200px"><br><br>--}}
    {{--@else--}}
        {{--I don't have any records!--}}
    {{--@endif--}}
    @endforeach

    </body>
    </html>