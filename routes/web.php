<?php

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
Route::get('/admin', function () {
    return view('admin/dashboard');
});
Route::get('/dashboard', function () {
    return view('admin/dashboard');
});
Route::get('/layout', function () {
    return view('layouts/admin');
});
Route::get('/profile', function () {
    return view('admin/profile');
});
/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/blogs', function () {
    return view('admin/view-blogs');
});
Route::get('/admin/blog', function () {
    return view('admin/view-blog');
});
Route::get('/admin/add-blog', function () {
    return view('admin/add-blog');
});
Route::post('/admin/add-blog', function () {
    return view('admin/view-blog');
});

/*
|--------------------------------------------------------------------------
| Sub-admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/subadmins', function () {
    return view('admin/view-subadmins');
});
Route::get('/admin/subadmin', function () {
    return view('admin/view-subadmins');
});
Route::get('/admin/add-subadmin', function () {
    return view('admin/add-subadmin');
});
Route::post('/admin/add-subadmin', function () {
    return view('admin/view-subadmin');
});