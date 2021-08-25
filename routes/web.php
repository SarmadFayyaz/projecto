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
    $page = 'Dashboard';
    return view('backend.admin.dashboard', compact('page'));
});
Route::get('/test', function () {
    $page = 'Test 2';
    return view('backend.admin.test', compact('page'));
});
Route::get('/task-requests', function () {
    $page = 'Task Requests';
    return view('backend.admin.task-requests', compact('page'));
});
Route::get('/projects', function () {
    $page = 'Projects';
    return view('backend.admin.projects', compact('page'));
});
Route::get('/profile', function () {
    $page = 'Profile';
    return view('backend.admin.profile.index', compact('page'));
});
Route::get('/edit-profile', function () {
    $page = 'Edit Profile';
    return view('backend.admin.profile.edit', compact('page'));
});
