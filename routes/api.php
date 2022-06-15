<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});
Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');

Route::get(('/todo-lists'), 'HomeController@todoLists');
Route::post(('/todo-lists'), 'TodoListController@store');
Route::put(('/todo-lists/{id}'), 'TodoListController@update');
Route::delete(('/todo-lists/{id}'), 'TodoListController@destroy');

Route::post(('/todo-lists/{id}/todos'), 'TodoController@store');
Route::put(('/todo-lists/{id}/todos/{todoId}'), 'TodoController@update');

Route::get(('/tags'), 'TagController@index');
Route::post(('/tags'), 'TagController@store');
Route::put(('/tags/{id}'), 'TagController@update');
Route::delete(('/tags/{id}'), 'TagController@destroy');

