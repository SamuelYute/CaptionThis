<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth', 'middleware' => 'api'], function () {
    Route::post('login', 'APIAuthController@login');
    Route::post('register', 'APIAuthController@register');
    Route::post('logout', 'APIAuthController@logout');
    Route::post('refresh', 'APIAuthController@refresh');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/test', 'APIAuthController@test');
});

Route::group(['prefix' => 'captions'], function () {
    Route::get('/', 'CaptionsController@getAllCaptions');
    Route::get('/{caption}', 'CaptionsController@getCaption');

    Route::get('/{caption}/replies', 'CaptionsController@getCaptionReplies');
    Route::get('/{caption}/likes', 'CaptionsController@getCaptionLikes');
    Route::get('/{caption}/picture', 'CaptionsController@getCaptionPicture');

    Route::group(['middleware' => 'auth:api'], function (){
        Route::post('/{picture}', 'CaptionsController@store');
        Route::put('/{caption}', 'CaptionsController@update');
        Route::delete('/{caption}', 'CaptionsController@delete');

        Route::get('/{caption}/toggleLike', 'CaptionsController@toggleLike');
        Route::post('/{caption}/reply', 'CaptionsController@sendReply');
    });
});

Route::group(['prefix' => 'pictures'], function () {
    Route::get('/', 'PicturesController@getAllPictures');
    Route::get('/{picture}', 'PicturesController@getPicture');

    Route::get('/{picture}/replies', 'PicturesController@getPictureReplies');
    Route::get('/{picture}/captions', 'PicturesController@getPictureCaptions');

    Route::group(['middleware' => 'auth:api'], function (){
        Route::post('/', 'PicturesController@store');
        Route::delete('/{picture}', 'PicturesController@delete');

        Route::get('/{picture}/toggleLike', 'PicturesController@toggleLike');
        Route::post('/{picture}/reply', 'PicturesController@sendReply');
    });
});

Route::group(['prefix' => 'replies','middleware' => 'auth:api'], function () {
    Route::post('/{reply}', 'PicturesController@store');
    Route::delete('/{reply}', 'PicturesController@delete');
});
