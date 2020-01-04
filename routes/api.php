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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// get all students
Route::get('students','ApiController@getAllStudents');
// get a student
Route::get('students/{id}','ApiController@getStudent');
// create student
Route::post('students','ApiController@createStudent');
// update student
Route::put('students/{id}','ApiController@updateStudent');
// delete student
Route::delete('students/{id}','ApiController@deleteStudent');

