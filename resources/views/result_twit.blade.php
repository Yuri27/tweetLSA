@extends('layouts._layout')

@section('content')

    <div id="main">

        <!-- Post -->
        <section class="post">
            <?
                $i=1;
            ?>

                <article>

                    <ul class="actions">
                        {{--<a type="button" href="{{action('ExploreController@exploreMood')}}">--}}
                            {{--Визначити</a>--}}
                        <form action="{{ route('explore') }}" method="POST" id="myform">
                            <input type="hidden" name="name" value="{{$username}}">
                            {{--<input type="hidden" name="tweets" value="{{$tweetarray}}">--}}
                            <button type="submit">Визначити</button>
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </article>
                @foreach($tweetarray as $twit)
                    <p>{{ $i.'. '.$twit->text }}</p>
                    <?$i++;?>
                @endforeach

        </section>

    </div>
@stop