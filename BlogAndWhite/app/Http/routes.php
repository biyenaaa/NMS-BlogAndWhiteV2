<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');
Route::get('/accounts', 'AccountController@index');
Route::get('home', 'HomeController@index');
Route::get('/about', 'WelcomeController@test');
Route::get('/', 'PostController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/manage_posts', 'PostController@manage_posts');
Route::get('/admin/manage_accounts', 'AuthorController@manage_accounts');
Route::get('/admin/manage_comments', 'CommentsController@index');

//insert blogs
Route::get('/blog_form', 'AuthorController@blog_form');
Route::post('/create_blogs', 'AuthorController@insert_posts');

Route::post('/admin/manage_accounts/update_account', 'AuthorController@update_account');
Route::post('/admin/manage_posts/update_post', 'PostController@update_post');
Route::post('/admin/manage_comments/update_comment', 'CommentsController@update_comment');

//route to show the login form
Route::get('/login', 'LoginController@showLogin');
//route to process the form
Route::post('/login', 'LoginController@doLogin');
//route to logout
Route::get('/logout', 'LoginController@doLogout');

//route to registration
Route::get('/register', 'RegistrationController@createRegistration');
//Route::post('/register', 'RegistrationController@storeRegistration');
Route::post('/registerProcess', 'RegistrationController@add_account');

// Route::post('/admin/manage_accounts/disable_account', 'AuthorController@disable_account');
/**Route::controllers([
	'auth' => 'Auth\AuthController',11111
	'password' => 'Auth\PasswordController',
]);**/
