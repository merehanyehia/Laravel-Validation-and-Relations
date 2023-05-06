<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('students')->group(function(){

    // Route::match(['get','post'],'App\Http\Controllers\ContactController@list');
 Route::get('createForm','App\Http\Controllers\StudentController@create')->name('student.create')->middleware('auth');
 Route::post('','App\Http\Controllers\StudentController@store')->name('student.store');
 Route::get('list','App\Http\Controllers\StudentController@index')->name('student.index');
 Route::get('{student}/updateForm','App\Http\Controllers\StudentController@edit')->name('student.edit');
 Route::put('{student}','App\Http\Controllers\StudentController@update')->name('student.update');
 Route::delete('{student}','App\Http\Controllers\StudentController@destroy')->name('student.destroy');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
