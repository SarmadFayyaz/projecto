<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\Pusher\PusherController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Backend\Admin\Auth\LoginController as AdminLogin;
use App\Http\Controllers\Backend\Admin\HomeController as AdminHome;
use App\Http\Controllers\Backend\Admin\RoleController as AdminRole;
use App\Http\Controllers\Backend\Admin\PermissionController as AdminPermission;
use App\Http\Controllers\Backend\Admin\AdminController as AdminAdmins;
use App\Http\Controllers\Backend\Admin\CompanyController as AdminCompany;
use App\Http\Controllers\Backend\Admin\ProfileController as AdminProfile;
use App\Http\Controllers\Backend\Admin\SupportController as AdminSupport;
use App\Http\Controllers\Backend\Admin\VideoController as AdminVideo;
use App\Http\Controllers\Backend\Admin\FaqController as AdminFaq;
use App\Http\Controllers\Backend\Admin\FormController as AdminForm;

use App\Http\Controllers\Backend\Company\Auth\LoginController as CompanyLogin;
use App\Http\Controllers\Backend\Company\HomeController as CompanyHome;
use App\Http\Controllers\Backend\Company\UserController as CompanyUser;
use App\Http\Controllers\Backend\Company\ProjectController as CompanyProject;
use App\Http\Controllers\Backend\Company\ProfileController as CompanyProfile;
use App\Http\Controllers\Backend\Company\SupportController as CompanySupport;

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
use App\Http\Controllers\Backend\User\EventController as UserEvent;
use App\Http\Controllers\Backend\User\NotificationController as UserNotification;
use App\Http\Controllers\Backend\User\ProfileController as UserProfile;
use App\Http\Controllers\Backend\User\SupportController as UserSupport;
use App\Http\Controllers\Backend\User\MethodOController as UserMethodO;
//use App\Http\Controllers\Backend\User\FormController as UserForm;

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

// Auth
Auth::routes(['register' => false, 'verify' => false]);

// Language Routes
Route::post('private/auth', [PusherController::class, 'privateChannel']);
Route::post('presence/auth', [PusherController::class, 'presenceChannel']);
Route::get('language/{lang}', [LanguageController::class, 'language'])->middleware('language');

// Admin Routes
Route::get('admin/login', [AdminLogin::class, 'showLoginForm']);
Route::post('admin/login', [AdminLogin::class, 'login'])->name('admin.login');
Route::group(['middleware' => ['admin', 'language'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminHome::class, 'index'])->name('index');
    Route::post('/setting', [AdminHome::class, 'setting'])->name('setting');

    Route::get('/admins/get', [AdminAdmins::class, 'get'])->name('admins.get');
    Route::resource('/admins', AdminAdmins::class);

    Route::get('/role/get', [AdminRole::class, 'get'])->name('role.get');
    Route::resource('role', AdminRole::class);
    Route::get('/permission/get', [AdminPermission::class, 'get'])->name('permission.get');
    Route::resource('permission', AdminPermission::class);

    Route::get('/company/get', [AdminCompany::class, 'get'])->name('company.get');
    Route::resource('company', AdminCompany::class);

    Route::get('profile', [AdminProfile::class, 'index'])->name('profile.index');
    Route::post('profile', [AdminProfile::class, 'update'])->name('profile.update');

    Route::get('support', [AdminSupport::class, 'index'])->name('support.index');
    Route::resource('video', AdminVideo::class);
    Route::resource('faq', AdminFaq::class);

    Route::get('/form/get', [AdminForm::class, 'get'])->name('form.get');
    Route::resource('form', AdminForm::class);
});

// Company Routes
Route::get('company/login', [CompanyLogin::class, 'showLoginForm']);
Route::post('company/login', [CompanyLogin::class, 'login'])->name('company.login');
Route::group(['middleware' => ['company', 'language'], 'prefix' => 'company', 'as' => 'company.'], function () {
    Route::get('/', [CompanyHome::class, 'index'])->name('index');
    Route::post('/setting', [CompanyHome::class, 'setting'])->name('setting');

    Route::get('/user/get', [CompanyUser::class, 'get'])->name('user.get');
    Route::resource('user', CompanyUser::class);

    Route::get('/project/get', [CompanyProject::class, 'get'])->name('project.get');
    Route::resource('project', CompanyProject::class);

    Route::get('profile', [CompanyProfile::class, 'index'])->name('profile.index');
    Route::post('profile', [CompanyProfile::class, 'update'])->name('profile.update');

    Route::get('support', [CompanySupport::class, 'index'])->name('support.index');
});

// User Routes
Route::group(['middleware' => ['auth', 'language']], function () {

    Route::get('/', [UserHome::class, 'index'])->name('index');
    Route::post('/setting', [UserHome::class, 'setting'])->name('setting');

    Route::get('/project/{id}', [UserProject::class, 'index'])->name('project');
    Route::get('/project-show/{id}', [UserProject::class, 'show'])->name('project.show');
    Route::get('/projects', [UserProject::class, 'projects'])->name('projects');
    Route::get('/projects/get', [UserProject::class, 'get'])->name('projects.get');
    Route::get('/project/{id}/finish', [UserProject::class, 'finish'])->name('project.finish');
    Route::get('/project/{id}/edit', [UserProject::class, 'edit'])->name('project.edit');
    Route::post('/project/{id}', [UserProject::class, 'update'])->name('project.update');

    Route::get('task/requests', [UserTaskRequests::class, 'index'])->name('task.requests');
    Route::get('task/requests/get', [UserTaskRequests::class, 'get'])->name('task.requests.get');
    Route::get('task/requests/{id}/edit', [UserTaskRequests::class, 'edit'])->name('task.requests.edit');
    Route::get('task/requests/{id}/show', [UserTaskRequests::class, 'show'])->name('task.requests.show');
    Route::post('task/requests/update', [UserTaskRequests::class, 'update'])->name('task.requests.update');
    Route::get('task/requests/{id}/delete', [UserTaskRequests::class, 'delete'])->name('task.requests.delete');

    Route::get('task/completed/{id}', [UserTask::class, 'completed'])->name('task.completed');
    Route::get('task/load/{project_id}/{type}/', [UserTask::class, 'load'])->name('task.load');
    Route::resource('task', UserTask::class);
    Route::resource('task-action', UserTaskAction::class);
    Route::get('task-note/load/{project_id}/', [UserTaskNote::class, 'load'])->name('task-note.load');
    Route::resource('task-note', UserTaskNote::class);

    Route::post('join-call', [UserVideo::class, 'joinCall']);
    Route::get('screen-share', [UserVideo::class, 'screenShare']);
    Route::post('screen-shared', [UserVideo::class, 'screenShared']);

    Route::resource('group-conversation', UserGroupConversation::class);
    Route::resource('individual-conversation', UserIndividualConversation::class);
    Route::get('get-document/{section}/{project_id}', [UserDocument::class, 'index'])->name('get-document');
    Route::post('important-document', [UserDocument::class, 'important'])->name('important-document');
    Route::post('delete-document', [UserDocument::class, 'delete'])->name('delete-document');
    Route::post('upload-document', [UserDocument::class, 'upload'])->name('upload-document');
    //    Route::get('download-document/{id}', [UserDocument::class, 'download'])->name('download-document');

    Route::post('event-update', [UserEvent::class, 'updateEvent'])->name('update-event');
    Route::resource('event', UserEvent::class);

    Route::resource('notification', UserNotification::class);

    Route::get('profile', [UserProfile::class, 'index'])->name('profile.index');
    Route::post('profile', [UserProfile::class, 'update'])->name('profile.update');

    Route::get('support', [UserSupport::class, 'index'])->name('support.index');

    Route::get('method_o/{project_id}/{type}', [UserMethodO::class, 'index'])->name('method_o');

//    Route::resource('form', UserForm::class);
});
