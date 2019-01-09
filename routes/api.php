<?php

use Illuminate\Http\Request;
use App\Http\Requests;
use App\File;
use App\Http\Resources\File as FileResource;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// get list of files
// Route::get('files','FileController@index');
// // get specific file
// Route::get('file/{id}','FileController@show');
// // create new file
// Route::post('file','FileController@store');
// // update existing file
// Route::put('file','FileController@store');
// // delete a file
// Route::delete('file/{id}','FileController@destroy');
Route::resource('files','FileController');

 // Route::get('/files', function(){
 //            return FileResource::collection(File::all());

 //            });


//for audios
Route::resource('audio','AudioController');

//for videos
Route::resource('video','AudioController');