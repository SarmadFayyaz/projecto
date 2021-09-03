<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Backend\Admin\Auth\LoginController as AdminLogin;
use App\Http\Controllers\Backend\Admin\HomeController as AdminHome;
use App\Http\Controllers\Backend\Admin\RoleController as AdminRole;
use App\Http\Controllers\Backend\Admin\PermissionController as AdminPermission;
use App\Http\Controllers\Backend\Admin\AdminController as Admin;
use App\Http\Controllers\Backend\Admin\CompanyController as AdminCompany;

use App\Http\Controllers\Backend\Company\Auth\LoginController as CompanyLogin;
use App\Http\Controllers\Backend\Company\HomeController as CompanyHome;
use App\Http\Controllers\Backend\Company\UserController as CompanyUser;
use App\Http\Controllers\Backend\Company\ProjectController as CompanyProject;


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

// Language Routes
Route::get('language/{lang}', [LanguageController::class, 'language'])->middleware('language');

Route::get('/', function () {
    $page = 'Dashboard';
    return view('backend.backup.dashboard', compact('page'));
});
Route::get('/test', function () {
    $page = 'Test 2';
    return view('backend.backup.test', compact('page'));
});
Route::get('/task-requests', function () {
    $page = 'Task Requests';
    return view('backend.backup.task-requests', compact('page'));
});
Route::get('/projects', function () {
    $page = 'Projects';
    return view('backend.backup.projects', compact('page'));
});
Route::get('/profile', function () {
    $page = 'Profile';
    return view('backend.backup.profile.index', compact('page'));
});
Route::get('/edit-profile', function () {
    $page = 'Edit Profile';
    return view('backend.backup.profile.edit', compact('page'));
});
Route::get('/help', function () {
    $page = 'Help';
    return view('backend.backup.help', compact('page'));
});
Route::get('/metodo', function () {
    $page = 'Me Todo';
    return view('backend.backup.metodo', compact('page'));
});
Route::get('/meeting-mode', function () {
    $page = 'Meeting Mode';
    return view('backend.backup.meeting-mode', compact('page'));
});

Auth::routes(['register' => false, 'verify' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Admin Routes
Route::get('admin/login', [AdminLogin::class, 'showLoginForm']);

Route::post('admin/login', [AdminLogin::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminHome::class, 'index'])->name('dashboard');
    Route::post('/setting', [AdminHome::class, 'setting'])->name('setting');

    Route::get('/role/get', [AdminRole::class, 'get'])->name('role.get');
    Route::resource('role', AdminRole::class);
    Route::get('/permission/get', [AdminPermission::class, 'get'])->name('permission.get');
    Route::resource('permission', AdminPermission::class);

    Route::get('/company/get', [AdminCompany::class, 'get'])->name('company.get');
    Route::resource('company', AdminCompany::class);
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/get', [Admin::class, 'get'])->name('admin.get');
    Route::resource('/admin', Admin::class);
});


// Company Routes
Route::get('company/login', [CompanyLogin::class, 'showLoginForm']);
Route::post('company/login', [CompanyLogin::class, 'login'])->name('company.login');
Route::group(['middleware' => 'company', 'prefix' => 'company', 'as' => 'company.'], function () {
    Route::get('/dashboard', [CompanyHome::class, 'index'])->name('dashboard');
    Route::post('/setting', [CompanyHome::class, 'setting'])->name('setting');

    Route::get('/user/get', [CompanyUser::class, 'get'])->name('user.get');
    Route::resource('user', CompanyUser::class);

    Route::get('/project/get', [CompanyProject::class, 'get'])->name('project.get');
    Route::resource('project', CompanyProject::class);
});
