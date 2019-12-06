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

Route::get('/', 'StoryController@welcome')->name('welcome');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// Stories
Route::group(['middleware' => ['role:User']], function () {
    Route::resource('me/stories', 'PostController');
});

// Read
// Route::resource('stories', 'StoryController');
Route::get('stories', 'StoryController@index')->name('story.index');
Route::get('stories/{id}/read', 'StoryController@read')->name('story.read');
Route::get('stories/automotive', 'StoryController@automotive')->name('story.automotive');
Route::get('stories/technology', 'StoryController@technology')->name('story.technology');
Route::get('stories/photoghrapy', 'StoryController@photoghrapy')->name('story.photoghrapy');
Route::get('stories/sports', 'StoryController@sports')->name('story.sports');
Route::get('stories/games', 'StoryController@games')->name('story.games');
Route::get('stories/misc', 'StoryController@misc')->name('story.misc');

// CKEditor
Route::post('ck/image_upload', 'PostController@imageUpload')->name('ck.upload');

// Categories