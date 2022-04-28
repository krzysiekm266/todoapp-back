<?php
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('task/store',[TaskController::class,'store']);
Route::get('task/index',[TaskController::class,'index']);
Route::get('task/show/{task}',[TaskController::class,'show'])->where('task','[a-zA-Z0-9]+');
