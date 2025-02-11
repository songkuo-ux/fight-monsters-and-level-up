<?php

use App\Http\Controllers\SchoolController;
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

Route::get('/', function () {return ('welcome');});
Route::prefix('create')->group(function () {
    Route::post('/school', [SchoolController::class, 'create_school'])->name('create.school');
    Route::post('/class', [OrgClassController::class, 'create_class'])->name('create.class');
});
Route::get('/select/class', [OrgClassController::class, 'selectSchool']);


