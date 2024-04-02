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


Route::get('/workspace/Getworkspace',[App\Http\Controllers\WorkspaceController::class,'getWorkspace'])->name('get');
Route::get('/workspace/table_workspace',[App\Http\Controllers\WorkspaceController::class,'index'])->name('tableWorkspace');
//Route::get('/team/{teamId}/space',[App\Http\Controllers\WorkspaceController::class,'getSpace'])->name('get_space');

Route::get('/space',[App\Http\Controllers\SpaceController::class,'index'])->name('space');
Route::get('/space/getspace',[App\Http\Controllers\SpaceController::class,'getSpace'])->name('get_space');

Route::get('/space/spaceadd',[App\Http\Controllers\SpaceController::class,'add'])->name('add');
Route::post('/space/spaceadd/createSpace',[App\Http\Controllers\SpaceController::class,'create'])->name('create_space');

Route::get('/space/space_update/{id}',[App\Http\Controllers\SpaceController::class,'edit'])->name('editspace');


Route::get('/list',[App\Http\Controllers\ListController::class,'index'])->name('list');
Route::get('/tasks',[App\Http\Controllers\TasksController::class,'index'])->name('tasks');



Route::post('webhook', [ZoomController::class, 'webhookHandler'])->name('webhookHandler');
