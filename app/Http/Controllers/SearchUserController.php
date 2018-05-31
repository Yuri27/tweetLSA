<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;

class SearchUserController extends Controller
{
    //
    public function index() {
        return view('usersearch',['description' => 'Moderna - Головна сторінка',
            'title' => 'Moderna - Головна сторінка']);
    }
    public function search(Request $request) {


        $res = Twitter::getUsersSearch(['q'=>$request->name, 'page' => $request->page, 'count' => 20, 'format' => 'json']);
        $resarray = json_decode($res);

       /* echo count($resarray).'<br>';

        $l = 0;
        foreach($resarray as $key){
            dump($resarray);
            //echo $tweetarray[$l]->text.'<br>';

            $l++;
        }
        echo '<br>total values->>>>>>>>>'.$l;*/
        return view('result_search', ['description' => 'Moderna - Головна сторінка',
            'title' => 'Moderna - Головна сторінка'], ['resarray' => $resarray]);
    }
}
