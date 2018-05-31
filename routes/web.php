<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', ['description' => 'Moderna - Головна сторінка',
        'title' => 'Moderna - Головна сторінка']);
});

Route::get('/generic', function () {
    return view('generic', ['description' => 'Moderna - Головна сторінка',
        'title' => 'Moderna - Головна сторінка']);
});

Route::get('/elements', function () {
    return view('elements', ['description' => 'Moderna - Головна сторінка',
        'title' => 'Moderna - Головна сторінка']);
});


Route::get('/contact', function () {
    return view('elements', ['description' => 'Moderna - Головна сторінка',
        'title' => 'Moderna - Головна сторінка']);
});
//Route::get('twit', ['as' => 'twit', 'uses' => 'UserController@index']);

Route::post('/user',  ['as' => 'user', 'uses' => 'UserController@store']);

Route::post('/explore',  ['as' => 'explore', 'uses' => 'ExploreController@exploreMood']);

Route::get('user_search', ['as' => 'user_search', 'uses' => 'SearchUserController@index']);

Route::post('/search',  ['as' => 'search', 'uses' => 'SearchUserController@search']);

Route::post('/favorite_post',  ['as' => 'favorite_post', 'uses' => 'FavoritePostsController@show']);


Route::get('/userTimeline', ['as' => 'user-time-line', function()
{
//	return Twitter::getUserTimeline(['screen_name' => '@MistEr_Yuri', 'count' => 20, 'format' => 'json']);
	//$twit = Twitter::getUserTimeline(['screen_name' => '@BHH_2', 'count' => 200, 'format' => 'json']);
	$twit = Twitter::getUserTimeline(['screen_name' => 'ayron1705', 'count' => 200, 'format' => 'json']);
	/*количество твитов*/
	$tweetarray = json_decode($twit);
	
	echo count($tweetarray).'<br>';
    dump($tweetarray);
	$l = 0;
	foreach($tweetarray as $key){
	    //dump($tweetarray);
		//echo $tweetarray[$l]->text.'<br>';

		$l++;
	}
	echo '<br>total values->>>>>>>>>'.$l;
	
}]);

Route::get('/getUser', function()
{
    return Twitter::getUser(['screen_name' => 'ayron1705', 'count' => 20, 'format' => 'json']);
});

Route::get('/searchUser', function()
{
    $res = Twitter::getUsersSearch(['q'=>'MAX', 'count'=>50, 'format' => 'json']);
    $resarray = json_decode($res);

    echo count($resarray).'<br>';
    dump($resarray);
    $l = 0;
    foreach($resarray as $key){
       // dump($resarray);
        //echo $tweetarray[$l]->text.'<br>';

        $l++;
    }
    echo '<br>total values->>>>>>>>>'.$l;

});

Route::get('/favorites', function()
{
    $home = Twitter::getFavorites(['screen_name' => 'MistEr_Yuri','count' => 30, 'format' => 'json']);
	$resarray = json_decode($home);
	//dump($resarray);
});

Route::get('/homeTimeline', function()
{
    $home = Twitter::getHomeTimeline(['screen_name' => 'ayron1705','count' => 30, 'format' => 'json']);
	$resarray = json_decode($home);
	//dump($resarray);
});

Route::get('/mentionsTimeline', function()
{
	return Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']);
});

Route::get('/tweet', function()
{
	return Twitter::postTweet(['status' => 'Laravel is beautiful', 'format' => 'json']);
});