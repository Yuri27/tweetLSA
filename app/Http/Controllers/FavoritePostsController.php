<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;

class FavoritePostsController extends Controller
{
    //
    public function show(Request $request) {


        $posts = Twitter::getFavorites(['screen_name' => '@'.$request->name, 'count' => 200, 'format' => 'json']);
        //echo $twit;

        /*количество твитов*/
        $postsarray = json_decode($posts);

        /*echo count($tweetarray).'<br>';

        $l = 0;
        foreach($tweetarray as $key){
        echo $tweetarray[$l]->text.'<br>';

        $l++;
        }
        echo '<br>total values->>>>>>>>>'.$l;*/
        return view('favorite_posts', ['posts' => $postsarray]);
    }
}
