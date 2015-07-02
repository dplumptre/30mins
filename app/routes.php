<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/email', function()
{
  
  return View::make('mail.message');
});




Route::get('/activate/{any}', 'HomeController@showActivate');


Route::get('/cronemail', 'HomeController@showCron');


Route::get('/about-us', 'HomeController@showAbout');
Route::get('/', 'HomeController@showWelcome');
Route::post('/','HomeController@showPrayerpost');
Route::get('/register', 'HomeController@showRegister');
Route::post('/register', 'HomeController@Doregisteration');

Route::get('/shout-of-praise', 'HomeController@showsShoutofpraises');
Route::get('/shout-of-praise/{id}', 'HomeController@showsSpecShoutofpraises');

Route::get('/prayer-post/{any}', 'HomeController@showSpecificprayer');
Route::get('/prayer/{id}', 'HomeController@showOneprayer');
Route::post('/prayer/{id}', 'HomeController@DoComment');

Route::get('/registration-benefit', 'HomeController@showregbenefit');
Route::get('/password-reset', 'HomeController@showReset');
Route::post('/password-reset', 'HomeController@DoReset');

Route::get('/media', 'HomeController@showMedia');
Route::get('/media/{id}', 'HomeController@showsSpecmedia');
Route::get('/live', 'HomeController@showLive');


//
//user area prayers
//


Route::get('/user-area', 'UserController@showIndex');

Route::get('/user-area/view-prayers', 'UserController@ViewPrayers');
Route::get('/user-area/view-prayers/{id}/edit-prayers', 'UserController@EditPrayers');
Route::put('/user-area/view-prayers/{id}',[ 
    'uses'=>'UserController@UpdatePrayers',
    'as'=>'user-area.update-prayers'  
] );
Route::delete('/user-area/view-prayers/{id}', 'UserController@destroyPrayers');


//
//
//user-area   shoutout testimonies
//
//



Route::get('/user-area/change-password', 'UserController@ChangePassword');
Route::post('/user-area/change-password', 'UserController@DoChangePassword');

Route::get('/user-area/create-shoutout', 'UserController@CreateShoutout');
Route::post('/user-area/create-shoutout','UserController@DoShoutout');

Route::get('/user-area/{id}/edit-shoutout', 'UserController@EditShoutout');
Route::put('/user-area/{id}',[ 
    'uses'=>'UserController@Updateshoutout',
    'as'=>'user-area.update-shoutout'  
] );
Route::delete('/user-area/{id}', 'UserController@destroyshoutout');


//
//
//user-area   comments
//
//

Route::get('/user-area/view-comments', 'UserController@ViewComments');
Route::get('/user-area/view-comments', 'UserController@ViewComments');
Route::get('/user-area/view-comments/{id}/edit-comments', 'UserController@EditComments');
Route::put('/user-area/view-comments/{id}',[ 
    'uses'=>'UserController@UpdateComments',
    'as'=>'user-area.update-comments'  
] );
Route::delete('/user-area/view-comments/{id}', 'UserController@destroyComments');








//
//
//
//Admin Area
//all route in the admin
//
//


Route::get('/admin-area/export-all-prayers', 'AdminController@ExportAllPrayers');
Route::post('/admin-area/export-all-prayers', 'AdminController@PostExportAllPrayers');

Route::get('/admin-area/export', 'AdminController@export');






Route::get('/admin-area', 'AdminController@showIndex');
Route::post('/admin-area', 'AdminController@doAccess');
Route::delete('/admin-area/{id}', 'AdminController@destroyUsers');


Route::get('/admin-area/view-prayers', 'AdminController@ViewPrayers');
Route::get('/admin-area/change-password', 'AdminController@ChangePassword');
Route::post('/admin-area/change-password', 'AdminController@DoChangePassword');
Route::get('/admin-area/view-prayers', 'AdminController@ViewPrayers');
Route::get('/admin-area/view-prayers/{id}/edit-prayers', 'AdminController@EditPrayers');
Route::put('/admin-area/view-prayers/{id}',[ 
    'uses'=>'AdminController@UpdatePrayers',
    'as'=>'admin-area.update-prayers'  
] );
Route::delete('/admin-area/view-prayers/{id}', 'AdminController@destroyPrayers');





Route::get('/admin-area/view-comments', 'AdminController@ViewComments');
Route::get('/admin-area/view-comments', 'AdminController@ViewComments');
Route::get('/admin-area/view-comments/{id}/edit-comments', 'AdminController@EditComments');
Route::put('/admin-area/view-comments/{id}',[ 
    'uses'=>'AdminController@UpdateComments',
    'as'=>'admin-area.update-comments'  
] );
Route::delete('/admin-area/view-comments/{id}', 'AdminController@destroyComments');













Route::get('/admin-area/live', 'AdminController@showLive');
Route::get('/admin-area/create-media', 'AdminController@CreateMedia');
Route::post('/admin-area/create-media','AdminController@DoMedia');

Route::get('/admin-area/media', 'AdminController@ViewMedia');
Route::post('/admin-area/media', 'AdminController@DoAjaxMedia');
Route::get('/admin-area/media/{id}/edit-media', 'AdminController@EditMedia');
Route::put('/admin-area/media/{id}',[ 
    'uses'=>'AdminController@UpdateMedia',
    'as'=>'admin-area.update-media'  
] );
Route::delete('/admin-area/media/{id}', 'AdminController@destroyMedia');



Route::get('/admin-area/special-email', 'AdminController@SpecialEmail');
Route::get('/admin-area/create-special-email', 'AdminController@CreateEmail');
Route::post('/admin-area/create-special-email', 'AdminController@PostEmail');
Route::delete('/admin-area/special-email/{id}', 'AdminController@destroySpecialEmail');











Route::controller('login', 'LoginController');

Route::get('/logout', function()
{
  Auth::logout() ;
  return Redirect::to('login')->with('success-message','you are now logged out');
});































//
//
//Event::listen('illuminate.query', function($sql){
//    
//    var_dump($sql);
//} );
//

