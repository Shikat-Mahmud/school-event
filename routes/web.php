<?php

use App\Http\Controllers\backend\EventController;
use App\Http\Controllers\backend\EventScheduleController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\GuestController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\EventRegisterController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\frontend\TeamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
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


// all event route
Route::get('/get-event-datetime', [EventController::class, 'getEventDate']);
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/add-event', [EventController::class, 'create'])->name('create.event');
Route::post('/add-event', [EventController::class, 'store'])->name('store.event');
Route::get('/edit-event/{id}', [EventController::class, 'edit'])->name('edit.event');
Route::post('/edit-event/{id}', [EventController::class, 'update'])->name('update.event');
Route::post('/destroy-event/{id}', [EventController::class, 'destroy'])->name('destroy.event');

Route::get('/event-detail', [EventController::class, 'eventDetail'])->name('event.detail');


// all event schedule route
Route::get('/event-schedule', [EventScheduleController::class, 'index'])->name('event.schedule');
Route::get('/add-event-schedule', [EventScheduleController::class, 'create'])->name('create.event.schedule');
Route::post('/add-event-schedule', [EventScheduleController::class, 'store'])->name('store.event.schedule');
Route::get('/edit-event-schedule/{id}', [EventScheduleController::class, 'edit'])->name('edit.event.schedule');
Route::post('/edit-event-schedule/{id}', [EventScheduleController::class, 'update'])->name('update.event.schedule');
Route::post('/destroy-event-schedule/{id}', [EventScheduleController::class, 'destroy'])->name('destroy.event.schedule');


// all event guest route
Route::get('/guests', [GuestController::class, 'index'])->name('guests');
Route::get('/add-guest', [GuestController::class, 'create'])->name('create.guest');
Route::post('/add-guest', [GuestController::class, 'store'])->name('store.guest');
Route::get('/edit-guest/{id}', [GuestController::class, 'edit'])->name('edit.guest');
Route::post('/edit-guest/{id}', [GuestController::class, 'update'])->name('update.guest');
Route::post('/destroy-guest/{id}', [GuestController::class, 'destroy'])->name('destroy.guest');


// all review route
Route::get('/event-review', [ReviewController::class, 'index'])->name('event.review');
Route::post('/event-review', [ReviewController::class, 'store'])->name('post.review');
Route::get('/reviews', [ReviewController::class, 'showReviews'])->name('reviews');
Route::get('/review-status/{review}', [ReviewController::class, 'changeStatus'])->name('change.review.status');


// all contact route
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('post.contact');
Route::get('/contact-list', [ContactController::class, 'showContact'])->name('contact.list');
Route::get('/contact-view/{id}', [ContactController::class, 'view'])->name('contact.view');


// all contact route
Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/team-list', [TeamController::class, 'teamList'])->name('team.list');
Route::get('/add-team', [TeamController::class, 'create'])->name('create.team');
Route::post('/add-team', [TeamController::class, 'store'])->name('store.team');
Route::get('/edit-team/{id}', [TeamController::class, 'edit'])->name('edit.team');
Route::post('/edit-team/{id}', [TeamController::class, 'update'])->name('update.team');
Route::post('/destroy-team/{id}', [TeamController::class, 'destroy'])->name('destroy.team');


// all register route
Route::get('/register-list', [EventRegisterController::class, 'index'])->name('register.list');
Route::get('/ticket', [EventRegisterController::class, 'create'])->name('ticket');
Route::post('/ticket-create', [EventRegisterController::class, 'store'])->name('ticket.post');
Route::post('/payment-status-change/{eventRegister}', [EventRegisterController::class, 'changeStatus'])->name('payment.status.change');
Route::get('/student-detail/{id}', [EventRegisterController::class, 'showStudentDetail'])->name('student.detail');


// all gallery route
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery-list', [GalleryController::class, 'galleryList'])->name('gallery.list');
Route::get('/add-gallery', [GalleryController::class, 'create'])->name('create.gallery');
Route::post('/add-gallery', [GalleryController::class, 'store'])->name('store.gallery');
Route::post('/destroy-gallery/{id}', [GalleryController::class, 'destroy'])->name('destroy.gallery');