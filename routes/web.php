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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/deleteFiles', 'JsonCardBuilder@delFiles');

Route::middleware(['cors'])->group(function () {
    
    Route::post('/generateCard', 'JsonCardBuilder@makeJsonFile'); //it make json card with our style and store card style, logo to images
    Route::get('/getJsonFile', 'JsonCardBuilder@getJsonFile'); // It gets jsoncard file to load in 3d load function
    Route::post('/convertImage', 'JsonCardBuilder@convertImage')->name('convertImage'); // convert and remove image background

});