<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
		
		return view('twit');
	}
	
	public function store(Request $request) {

        $date = Carbon::now();

		$twit = Twitter::getUserTimeline(['screen_name' => '@'.$request->name, 'count' => 200, 'format' => 'json']);

		/*количество твитов*/
		$tweetarray = json_decode($twit);
		$k=0;
        $students = [];

        foreach ($tweetarray as $key) {
            $students[$k] = preg_replace('@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)*)@', '',$key->text);
            $k++;
        }

        //dump($students);
        //строка для записи в бд
        $res = implode(PHP_EOL, $students);
        //dump($res);
		try {
            //$users =DB::select('select name from cluster_heads where id = ?', [1]);

            //DB::insert('insert into tweets (user, tweets, date_time) values (?, ?, ?)', [$request->name, $res, $date]);

            return view('result_twit',['description' => 'Moderna - Головна сторінка',
                 'title' => 'Moderna - Головна сторінка'],  ['tweetarray' => $tweetarray, 'username' => $request->name]);

        }catch (\Exception $e){

		    return view('error',['description' => 'Error',
                'title' => 'Error'], ['message' =>  $e->getMessage()]);
            //echo $e->getMessage();
        }
	}
}
