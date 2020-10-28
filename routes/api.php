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


Route::get('office', 'OfficeController@index')->name('office.index');
Route::get('office/{office}', 'OfficeController@show')->name('office.show');
Route::post('office', 'OfficeController@store')->name('office.store');
Route::put('office/{office}', 'OfficeController@update')->name('office.update');
Route::delete('office/{office}', 'OfficeController@delete')->name('office.delete');
*/


Route::get('message', function () {
    $app = PHPRedis::connection();
$app->set("masterpowers", "Yeah Baby Yeah");
print_r($app->get("masterpowers"));
});

Route::get('office', 'App\Http\Controllers\OfficeController@index');
Route::get('office/{office}', 'App\Http\Controllers\OfficeController@show');
Route::post('office', 'App\Http\Controllers\OfficeController@store');
Route::put('office/{office}', 'App\Http\Controllers\OfficeController@update');
Route::delete('office/{office}', 'App\Http\Controllers\OfficeController@delete');
