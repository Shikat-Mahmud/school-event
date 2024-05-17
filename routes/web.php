<?php

use App\Http\Controllers\backend\EventController;
use App\Http\Controllers\backend\EventScheduleController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'permission:admin-panel'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users-create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users-store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users-details/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/roles/{user}', [UserController::class, 'role'])->name('users.roles.edit');
    Route::post('/users/roles/{user}', [UserController::class, 'giveRole'])->name('users.roles');

});

Route::get('/admin-login', [IndexController::class, 'login'])->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';

// all settings route
Route::get('/general-setting', [SettingsController::class, 'index'])->name('general.setting');
Route::post('/setting-update', [SettingsController::class, 'update'])->name('setting.update');

Route::get('/email-setting', [SettingsController::class, 'emailSetting'])->name('email.setting');
Route::post('/email-update', [SettingsController::class, 'emailUpdate'])->name('email.update');

Route::get('application-cache-clear', [SettingsController::class, 'cacheClear'])->name('application.cache.clear');


Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

Route::get('/get-event-datetime', [EventController::class, 'getEventDate']);
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/add-event', [EventController::class, 'create'])->name('create.event');
Route::post('/add-event', [EventController::class, 'store'])->name('store.event');
Route::get('/edit-event/{id}', [EventController::class, 'edit'])->name('edit.event');
Route::post('/edit-event/{id}', [EventController::class, 'update'])->name('update.event');
Route::post('/destroy-event/{id}', [EventController::class, 'destroy'])->name('destroy.event');

Route::get('/event-schedule', [EventScheduleController::class, 'index'])->name('event.schedule');
Route::get('/add-event-schedule', [EventScheduleController::class, 'create'])->name('create.event.schedule');
Route::post('/add-event-schedule', [EventScheduleController::class, 'store'])->name('store.event.schedule');
Route::get('/edit-event-schedule/{id}', [EventScheduleController::class, 'edit'])->name('edit.event.schedule');
Route::post('/edit-event-schedule/{id}', [EventScheduleController::class, 'update'])->name('update.event.schedule');
Route::post('/destroy-event-schedule/{id}', [EventScheduleController::class, 'destroy'])->name('destroy.event.schedule');

Route::get('/event-review', [ReviewController::class, 'index'])->name('event.review');
Route::post('/event-review', [ReviewController::class, 'store'])->name('post.review');
Route::get('/reviews', [ReviewController::class, 'showReviews'])->name('reviews');
Route::get('/review-status/{review}', [ReviewController::class, 'changeStatus'])->name('change-status');
