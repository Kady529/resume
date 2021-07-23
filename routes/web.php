<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('ztt', 'HomeController@ztt')->name('ztt');
Route::get('voiries', 'HomeController@voiries')->name('voiries');
Route::get('sensibilisation', 'HomeController@sensibilisation')->name('sensibilisation');

 //parcelles_ztt
Route::get('export', 'MyController@export')->name('export');
Route::post('fileImport', 'MyController@fileImport')->name('fileImport');


//sensibilisation
Route::post('importSensibilisation', 'MyController@importSensibilisation')->name('importSensibilisation');
Route::post('exportSensibilisation', 'MyController@exportSensibilisation')->name('exportSensibilisation');

//Voiries
Route::post('VoiriesImport', 'MyController@VoiriesImport')->name('VoiriesImport');

//connexion
Route::get('connexion', 'HomeController@connexion')->name('connexion');

Route::post('traitement', 'HomeController@traitement')->name('traitement');

//objectifs spécifiques
Route::post('ObjectifsImport', 'MyController@ObjectifsImport')->name('ObjectifsImport');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
