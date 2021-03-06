<?php

use Illuminate\Http\Request;
use App\Contact;

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

Route::get('/', function () {
    return response()->json(['message' => 'JM API', 'status' => 'Connected']);;
});

Route::resource('projects', 'ProjectsController');
Route::resource('contacts', 'ContactsController');
Route::resource('images', 'ImagesController');
Route::resource('skills', 'SkillsController');