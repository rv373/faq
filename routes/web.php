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

use Illuminate\Support\Facades\Input as Input;

use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/{user_id}/profile', 'ProfileController@create')->name('profile.create');
Route::get('/user/{user_id}/profile/{profile_id}', 'ProfileController@show')->name('profile.show');
Route::get('/user/{user_id}/profile/{profile_id}/edit', 'ProfileController@edit')->name('profile.edit');
Route::post('/user/{user_id}/profile/', 'ProfileController@store')->name('profile.store');
Route::patch('/user/{user_id}/profile/{profile_id}', 'ProfileController@update')->name('profile.update');
Route::delete('/user/{user_id}/profile/{profile_id}', 'ProfileController@destroy')->name('profile.destroy');

Route::get('/questions/{question_id}/answers/create', 'AnswerController@create')->name('answers.create');
Route::get('/questions/{question_id}/answers/{answer_id}', 'AnswerController@show')->name('answers.show');
Route::get('/questions/{question_id}/answers/{answer_id}/edit', 'AnswerController@edit')->name('answers.edit');
Route::post('/questions/{question_id}/answers/', 'AnswerController@store')->name('answers.store');
Route::patch('/questions/{question_id}/answer/{answer_id}', 'AnswerController@update')->name('answers.update');
Route::delete('/questions/{question_id}/answer/{answer_id}', 'AnswerController@destroy')->name('answers.destroy');


Route::resource('tags', 'TagController', ['except' => ['create']]);
/*Route::get('ItemSearch', 'ItemSearchController@index');
Route::post('ItemSearchCreate', 'ItemSearchController@create');*/


/*Route::get('/ItemSearch', ['as' => 'search', 'uses' => function() {
    echo $query;
    // Check if user has sent a search query
    if($query = Input::get('query', false)) {
        // Use the Elasticquent search method to search ElasticSearch
        $items = \App\Item::search($query);
    } else {
        // Show all posts if no query is set
        $items = \App\Item::all();
    }

    return View::make('home', compact('items'));

}]);*/
use App\Article;
/*Route::get('/', function () {
    Article::createIndex($shards = null, $replicas = null);

    Article::putMapping($ignoreConflicts = true);

    Article::addAllToIndex();

    return view('welcome');
});*/
//Route::get('/articles', function() {
//Route::get('/articles', ['as' => 'search', 'uses' => function() {
//
//    //$articles = Article::searchByQuery(['match' => ['title' => 'Sed']]);
//    if($query = Illuminate\Support\Facades\Input::get('query', false)) {
//        // Use the Elasticquent search method to search ElasticSearch
//        /*        $posts = Post::searchByQuery(['match' => ['title' => Input::get('query', '')]]);*/
//        $articles = Article::searchByQuery([
//            'multi_match' => [
//                'query' => Input::get('query', ''),
//                'fields' => [ "title^5", "body"]
//            ],
//        ]);
//    } else {
//        $articles = Article::all();
//    }
//    return View::make('articles', compact('articles'));
//}]);
//Route::get('/', ['as' => 'search', 'uses' => function() {
//
//    // Check if user has sent a search query
//    if($query = Illuminate\Support\Facades\Input::get('query', false)) {
//        // Use the Elasticquent search method to search ElasticSearch
///*        $posts = Post::searchByQuery(['match' => ['title' => Input::get('query', '')]]);*/
//        $posts = Post::searchByQuery([
//            'multi_match' => [
//                'query' => Input::get('query', ''),
//                'fields' => [ "title^5", "content"]
//            ],
//        ]);
//    } else {
//        // Show all posts if no query is set
//        $posts = Post::all();
//    }
//
//    return View::make('posts', compact('posts'));
//
//}]);

Route::resources([
    'questions' => 'QuestionController',
]);

