<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoomController;
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
    return view('pages.dashboard');
});


Route::get('/workspace',[App\Http\Controllers\WorkspaceController::class,'index'])->name('workspace');
Route::get('/space',[App\Http\Controllers\SpaceController::class,'index'])->name('space');
Route::get('/list',[App\Http\Controllers\ListController::class,'index'])->name('list');
Route::get('/tasks',[App\Http\Controllers\TasksController::class,'index'])->name('tasks');

