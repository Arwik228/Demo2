<?php

<<<<<<< HEAD
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
>>>>>>> 0.0.2
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

<<<<<<< HEAD

Route::get('/find/{id?}', function($id = false){
    return MainController::find($id);
});

Route::get('/model/{mask}/{name}', function($mask,$name){
    return MainController::createModel($mask,$name);
}); 
=======
Route::post('/find', function(Request $request){
    return MainController::find($request->json()->all());
});

Route::post('/model', function(Request $request){
    return MainController::createModel($request->json()->all());
});

Route::post('/device', function(Request $request){
    return MainController::createDevice($request->json()->all());
});
>>>>>>> 0.0.2
