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

$ns = 'MDH\Base\Controllers\\';

Route::get('/', ['as' => 'home', 'uses' => $ns.'UsersController@index']);

/**
 * Authentication
 */
Route::get( 'login',    ['as' => 'login',          'uses' => $ns.'SessionsController@create'])->before('guest');
Route::get( 'logout',   ['as' => 'logout',         'uses' => $ns.'SessionsController@destroy'])->before('auth');
Route::post('sessions', ['as' => 'sessions.store', 'uses' => $ns.'SessionsController@store'])->before('guest');

/**
 * Registration
 */
Route::get(   'register', ['as' => 'users.register',     'uses' => $ns.'UsersController@register']);
Route::post(  'register', ['as' => 'users.postRegister', 'uses' => $ns.'UsersController@postRegister']);

/**
 * Password Reset
 */
Route::get(   'password/remind',        ['as' => 'password.getRemind',  'uses' => $ns.'RemindersController@getRemind']);
Route::post(  'password/remind',        ['as' => 'password.postRemind', 'uses' => $ns.'RemindersController@postRemind']);
Route::get(   'password/reset/{token}', ['as' => 'password.getReset',   'uses' => $ns.'RemindersController@getReset']);
Route::post(  'password/reset',         ['as' => 'password.postReset',  'uses' => $ns.'RemindersController@postReset']);

/**
 * Users
 */
Route::get(   'users',      ['as' => 'users.index', 'uses' => $ns.'UsersController@index']);
Route::get(   'users/{id}', ['as' => 'users.show',  'uses' => $ns.'UsersController@show']);


/**
 * Admin Dashboard
 */
Route::group(['prefix' => 'admin', 'before' => 'auth'], function() use ($ns)
{
    Route::get('/', ['as' => 'admin.dashboard', 'uses' => $ns.'Admin\DashboardController@index']);
});

/**
 * Admin Users
 */
Route::group(['prefix' => 'admin', 'before' => 'auth'], function() use ($ns)
{
    Route::get(   'users',           ['as' => 'admin.users.index',   'uses' => $ns.'Admin\UsersController@index']);
    Route::get(   'users/create',    ['as' => 'admin.users.create',  'uses' => $ns.'Admin\UsersController@create']);
    Route::post(  'users',           ['as' => 'admin.users.store',   'uses' => $ns.'Admin\UsersController@store']);
    Route::get(   'users/{id}',      ['as' => 'admin.users.show',    'uses' => $ns.'Admin\UsersController@show']);
    Route::get(   'users/{id}/edit', ['as' => 'admin.users.edit',    'uses' => $ns.'Admin\UsersController@edit']);
    Route::post(  'users/{id}',      ['as' => 'admin.users.update',  'uses' => $ns.'Admin\UsersController@update']);
    Route::delete('users/{id}',      ['as' => 'admin.users.destroy', 'uses' => $ns.'Admin\UsersController@destroy']);
});
