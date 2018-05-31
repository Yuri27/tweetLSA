@extends('layouts._layout')

@section('content')

    <div id="main">

        <!-- Post -->
        <section class="post">
<?php setlocale(LC_ALL, 'Ukrainian');
    $months = array('January', 'February', 'March', 'April',
    'May', 'June', 'July', 'August',
    'September', 'October', 'November', 'December');
    $new_months = array('Января', 'Февраля','Марта', 'Апреля',
    'Мая', 'Июня', 'Июля', 'Августа',
    'Сентября', 'Октября', 'Ноября', 'Декабря');
?>

@foreach($themes as $res)
        {{$res['title']}} - {{$res['perc']}}%<br>

@endforeach
        </section>

    </div>
@stop