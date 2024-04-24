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
    return view('Login-page.login');
});


Route::get('/Login',[App\Http\Controllers\LoginController::class,'login'])->name('Login');

Route::post('/Login/actionlogin',[App\Http\Controllers\LoginController::class,'actionlogin'])->name('actionLogin');

Route::get('/Login/Forgot-Password',[App\Http\Controllers\LoginController::class,'forgotPass'])->name('Forgot');
Route::get('/Login/Forgot-Password/Reset-Password',[App\Http\Controllers\LoginController::class,'resetPass'])->name('Reset');


//Route bagian Workspace
Route::get('/workspace/Getworkspace',[App\Http\Controllers\WorkspaceController::class,'get'])->name('getwork');
Route::get('/workspace/Getworkspace/get',[App\Http\Controllers\WorkspaceController::class,'getWorkspace'])->name('getspace');
Route::get('/workspace/table_workspace',[App\Http\Controllers\WorkspaceController::class,'index'])->name('tableWorkspace');

//Route bagian Space
Route::get('/space',[App\Http\Controllers\SpaceController::class,'index'])->name('space');
Route::get('/space/getspace',[App\Http\Controllers\SpaceController::class,'getSpace'])->name('get_space');
Route::get('/space/detail_space/{id}',[App\Http\Controllers\SpaceController::class,'detailSpace'])->name('detailspace');
//Bagian Create
Route::get('/space/spaceadd',[App\Http\Controllers\SpaceController::class,'add'])->name('addspace');
Route::post('/space/spaceadd/createSpace',[App\Http\Controllers\SpaceController::class,'create'])->name('create_space');
//Bagian Update
Route::get('/space/space_update/{id}',[App\Http\Controllers\SpaceController::class,'edit'])->name('editspace');
Route::PUT('/space/space_update/{id}/simpan',[App\Http\Controllers\SpaceController::class,'update'])->name('updatespace');
//Delete
Route::get('/space/deletespace/{id}',[App\Http\Controllers\SpaceController::class,'destroy'])->name('hapusspace');

//Route bagian lists
Route::get('/list',[App\Http\Controllers\ListController::class,'index'])->name('list');
Route::get('/lists/getlist', [App\Http\Controllers\listController::class,'getList'])->name('get');
Route::get('/lists/detail_lists/{id}',[App\Http\Controllers\listController::class,'detailList'])->name('detaillists');
//Create
Route::get('/lists/addlist', [App\Http\Controllers\listController::class,'addlist'])->name('addlist');
Route::post('/lists/createlist', [App\Http\Controllers\listController::class,'createList'])->name('clist');
//Update
Route::get('/list/updatelist/{id}',[App\Http\Controllers\ListController::class,'edit'])->name('updateList');
Route::put('/list/updatelist/{id}/simpan',[App\Http\Controllers\ListController::class,'updatelist'])->name('simpan_List');
//Delete
Route::get('/list/deletelist/{id}',[App\Http\Controllers\ListController::class,'destroy'])->name('delist');

//Route bagian tasks
Route::get('/tasks/get_task', [App\Http\Controllers\TasksController::class,'gettask'])->name('taskget');
Route::get('/task/detail_tasks/{id}',[App\Http\Controllers\TasksController::class,'detailTask'])->name('detailtasks');
//Create
Route::get('/tasks/add_task', [App\Http\Controllers\TasksController::class,'addtask'])->name('add');
Route::post('/tasks/add_task/create', [App\Http\Controllers\TasksController::class,'create'])->name('createtask');
//Update
Route::get('/tasks/update_task/{id}',[App\Http\Controllers\TasksController::class,'edit'])->name('updateTask');
Route::put('/tasks/update_task/{id_tasks}/simpan',[App\Http\Controllers\TasksController::class,'updatetask'])->name('simpan_task');
//Delete
Route::get('/tasks/delete_tasks/{id}',[App\Http\Controllers\TasksController::class,'destroy'])->name('deltasks');


// Route::get('/lists/createFolder', [App\Http\Controllers\listController::class,'addfolder'])->name('folder');
// Route::post('/lists/createFolder/simpanFolder', [App\Http\Controllers\listController::class,'createfolder'])->name('folder_create');


Route::get('/tasks',[App\Http\Controllers\TasksController::class,'index'])->name('tasks');

