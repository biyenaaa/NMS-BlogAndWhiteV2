<?php


//Route::get('/', 'WelcomeController@index');
Route::get('/accounts', 'AccountController@index');
Route::get('home', 'HomeController@index');
Route::get('/about', 'WelcomeController@test');
//index homepage
Route::get('/', 'PostController@index');
Route::resource('posts', 'PostController');


Route::get('/admin', 'AdminController@index');
Route::get('/admin/manage_posts', 'PostController@manage_posts');
Route::get('/admin/manage_accounts', 'AuthorController@manage_accounts');
Route::get('/admin/manage_comments', 'CommentsController@index');

//insert blogs
Route::get('/blog_form', 'AuthorController@blog_form');
Route::post('/create_blogs', 'AuthorController@insert_posts');

//edit blogs
Route::get('/editblog', 'AuthorController@edit_blog_form');

//admin pages
Route::post('/admin/manage_accounts/update_account', 'AuthorController@update_account');
Route::post('/admin/manage_posts/update_post', 'PostController@update_post');
Route::post('/admin/manage_comments/update_comment', 'CommentsController@update_comment');
// Route::post('/admin/manage_accounts/disable_account', 'AuthorController@disable_account');
