<?php

use App\Http\Controllers\schoolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrgClassController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

*/

//Route::get('/', function () { return ('welcome');});
Route::post('/create/school', [schoolController::class, 'create']);
Route::post('/create/class', [OrgClassController::class, 'create']);
Route::get('/select/class', [OrgClassController::class, 'selectSchool']);


