<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Artisan;

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
//
//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return Inertia::render('Dashboard');
//    })->name('dashboard');
//});
// laravel 框架 写简单路由; ORM；Command命令；异步任务；mysql redis
Route::get('/test1/select', [\App\Http\Controllers\test1Controller::class,'user_test']);
Route::get('/test2/{id=1}/select', [\App\Http\Controllers\test1Controller::class,'user_test2']);
Route::get('/test3/{id=1}/select', function ($id) {
    return Artisan::call('test', ['userid' =>$id]);
});


