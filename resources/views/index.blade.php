<?
$mytime = Carbon\Carbon::now();
//echo $mytime->toDateTimeString();
?>

@extends('layouts._layout')

@section('content')

<div id="main">

    <!-- Featured Post -->
    <article class="post featured">
        <header class="major">
            <span class="date"><?echo $mytime->toDateTimeString();?></span>
            {{--<h2><a href="#">And this is a<br />--}}
                    {{--massive headline</a></h2>--}}
            {{--<p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />--}}
                {{--facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />--}}
                {{--amet nullam sed etiam veroeros.</p>--}}
        </header>
        {{--<a href="#" class="image main"><img src="images/pic01.jpg" alt="" /></a>--}}
        <ul class="actions">
            {{--<li><a href="#" class="button big">Full Story</a></li>--}}
        </ul>
    </article>

    <!-- Posts -->
    <section class="posts">

    </section>

</div>

@stop