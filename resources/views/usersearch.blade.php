@extends('layouts._layout')

@section('content')

    <div id="main">

        <!-- Post -->
        <section class="post">
            <form action="{{ route('search') }}" method="POST">
                <div class="row uniform">
                {{--<p><input type="text" name="name" placeholder="Ім'я"></p><br>--}}
                {{--<p><input type="text" name="page" placeholder="Сторінка"></p>--}}
                <div class="6u 12u$(xsmall)">
                    <input type="text" name="name" id="demo-name" placeholder="Ім'я" />
                </div>
                <div class="6u$ 12u$(xsmall)">
                    <input type="text" name="page" id="demo-email" placeholder="Сторінка" />
                </div>
                <div class="12u$">
                    <ul class="actions">
                        <li><input type="submit" value="Пошук" class="special" /></li>
                    </ul>
                </div>

                {{ csrf_field() }}
                </div>
            </form>
        </section>

    </div>
@stop