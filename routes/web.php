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

use App\Http\Controllers\Backend\User\HomeController as UserHome;
use App\Http\Controllers\Backend\User\ProjectController as UserProject;
use App\Http\Controllers\Backend\User\TaskController as UserTask;
use App\Http\Controllers\Backend\User\TaskActionController as UserTaskAction;
use App\Http\Controllers\Backend\User\TaskNoteController as UserTaskNote;
use App\Http\Controllers\Backend\User\TaskRequestsController as UserTaskRequests;
use App\Http\Controllers\Backend\User\VideoController as UserVideo;
use App\Http\Controllers\Backend\User\GroupConversationController as UserGroupConversation;
use App\Http\Controllers\Backend\User\IndividualConversationController as UserIndividualConversation;
use App\Http\Controllers\Backend\User\DocumentController as UserDocument;


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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [UserHome::class, 'index']);

    Route::get('/dashboard', [UserHome::class, 'index'])->name('dashboard');
    Route::get('/project/{id}', [UserProject::class, 'index'])->name('project');

    Route::get('/projects', [UserProject::class, 'projects'])->name('projects');
    Route::get('/projects/get', [UserProject::class, 'get'])->name('projects.get');
    Route::get('/project/{id}/edit', [UserProject::class, 'edit'])->name('project.edit');
    Route::post('/project/{id}', [UserProject::class, 'update'])->name('project.update');

    Route::get('task/requests', [UserTaskRequests::class, 'index'])->name('task.requests');
    Route::get('task/requests/get', [UserTaskRequests::class, 'get'])->name('task.requests.get');
    Route::get('task/requests/{id}/edit', [UserTaskRequests::class, 'edit'])->name('task.requests.edit');
    Route::get('task/requests/{id}/show', [UserTaskRequests::class, 'show'])->name('task.requests.show');
    Route::post('task/requests/update', [UserTaskRequests::class, 'update'])->name('task.requests.update');
    Route::get('task/requests/{id}/delete', [UserTaskRequests::class, 'delete'])->name('task.requests.delete');

    Route::get('task/completed/{id}', [UserTask::class, 'completed'])->name('task.completed');
    Route::resource('task', UserTask::class);
    Route::resource('task-action', UserTaskAction::class);
    Route::resource('task-note', UserTaskNote::class);

    Route::post('join-call', [UserVideo::class, 'joinCall']);
    Route::get('screen-share', [UserVideo::class, 'screenShare']);
    Route::post('screen-shared', [UserVideo::class, 'screenShared']);

    Route::resource('group-conversation', UserGroupConversation::class);
    Route::resource('individual-conversation', UserIndividualConversation::class);
    Route::get('get-document/{section}/{project_id}', [UserDocument::class, 'index'])->name('get-document');
    Route::post('important-document', [UserDocument::class, 'important'])->name('important-document');
    Route::post('upload-document', [UserDocument::class, 'upload'])->name('upload-document');
//    Route::get('download-document/{id}', [UserDocument::class, 'download'])->name('download-document');
});
