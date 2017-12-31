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


/*Auth::routes();*/

Route::get('/', 'PagesController@index')->name('index');
/*Route::get('/api/user', 'APIAuthController@test');*/

/*
Route::get('/mesho', 'PagesController@mesho')->name('mesho');
Route::get('/tags/{hashtag}', 'PagesController@showTagPictures')->name('showHashTagPictures');

Route::group(['prefix' => 'challenges'], function(){
  Route::get('/', ['as' => 'challenges', 'uses' => 'ChallengesController@index']);
  Route::get('/{slug}', ['as' => 'challenges.view', 'uses' => 'ChallengesController@index']);
  Route::post('/{slug}/enter', ['as' => 'challenges.view.enter', 'uses' => 'ChallengesController@index']);
  Route::get('/{slug}/withdraw', ['as' => 'challenges.view.withdraw', 'uses' => 'ChallengesController@index']);
});

Route::group(['prefix' => 'gallery'], function(){
  Route::get('/', ['as' => 'gallery', 'uses' => 'ChallengesController@index']);
});

Route::get('/about', 'PagesController@about')->name('about');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'],function (){
    Route::get('/', ['as' => 'dashboard.home', 'uses' => 'DashboardController@index']);

    Route::patch('/profile/edit', ['as' => 'dashboard.profile.edit', 'uses' => 'UsersController@update']);
    Route::put('/profile/change-password', ['as' => 'dashboard.profile.change-password', 'uses' => 'UsersController@updatePassword']);

    Route::post('/pictures', ['as' => 'dashboard.pictures.add', 'uses' => 'PicturesController@store']);

    Route::group(['prefix' => 'pictures'], function () {
        Route::get('/', ['as' => 'dashboard.pictures.add',  'uses' => 'PicturesController@store']);
        Route::put('/{id}', ['as' => 'dashboard.pictures.update',  'uses' => 'PicturesController@update']);
    });

    Route::group(['prefix' => 'admins'], function () {
      Route::get('/', ['as' => 'dashboard.admins']);

      Route::group(['prefix' => 'categories'], function () {
          Route::get('/', ['as' => 'dashboard.admins.categories']);
      });
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']],function (){
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);

    Route::group(['prefix' => 'challenges'], function(){
        Route::post('/', ['as' => 'admin.challenges.add', 'uses' => 'ChallengesController@store']);
        Route::put('/{id}', ['as' => 'admin.challenges.update', 'uses' => 'ChallengesController@update']);
        Route::get('/{id}', ['as' => 'admin.challenges.delete', 'uses' => 'ChallengesController@delete']);
        Route::get('/{id}/status', ['as' => 'admin.challenges.toggle-status', 'uses' => 'ChallengesController@toggleStatus']);
    });

    Route::group(['prefix' => 'categories'], function(){
        Route::post('/', ['as' => 'admin.categories.add', 'uses' => 'CategoriesController@store']);
        Route::put('/{id}', ['as' => 'admin.categories.update', 'uses' => 'CategoriesController@update']);
        Route::get('/{id}', ['as' => 'admin.categories.delete', 'uses' => 'CategoriesController@delete']);
        Route::get('/{id}/status', ['as' => 'admin.categories.toggle-status', 'uses' => 'CategoriesController@toggleStatus']);
    });

});

Route::group(['prefix' => 'pictures'], function () {
  Route::get('/{pictureId}/like', ['as' => 'picture.like', 'middleware' => 'auth', 'uses' => 'PicturesController@like' ]);
  Route::get('/{pictureId}/download', ['as' => 'picture.download', 'uses' => 'PicturesController@download']);
  Route::get('/{pictureId}/view', ['as' => 'picture.view', 'uses' => 'PicturesController@view']);
});*/
