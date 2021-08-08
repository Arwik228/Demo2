<?php

<<<<<<< HEAD
use App\Http\Controllers\MainController;
=======
>>>>>>> 0.0.2
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

Route::get('/{page?}', function ($page = 'index') {
    if(in_array($page,['index','device','model'])){
        return view('default')->with('page', $page);
    }
    abort(404);
<<<<<<< HEAD
});
=======
});
>>>>>>> 0.0.2
