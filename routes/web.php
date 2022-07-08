<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/register', [AuthConroller::class, 'register']);
Route::get('/admin/login', function () {
    return view('admin/login');
});
Route::post('/admin/login', [AuthConroller::class, 'login']);
Route::get('/admin/logout', [AuthConroller::class, 'logout']);
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
Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/profile', [AdminController::class, 'profile']);
Route::get('/layout', function () {
    return view('layouts/admin');
});

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/blogs', [BlogController::class, 'index']);
Route::get('/admin/blog', [BlogController::class, 'show']);
Route::get('/admin/add-blog', function () {
    return view('admin/add-blog');
});
Route::post('/admin/add-blog', [BlogController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Sub-admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/subadmins', [AdminController::class, 'view_sub_admins']);
Route::get('/admin/subadmin', [AdminController::class, 'view_sub_admin']);
Route::get('/admin/add-subadmin', function () {
    return view('admin/add-subadmin');
});
Route::post('/admin/add-subadmin', [AdminController::class, 'register_sub_admin']);