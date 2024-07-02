<?php

use App\Http\Controllers\backend\DonationController;
use App\Http\Controllers\backend\EventController;
use App\Http\Controllers\backend\EventScheduleController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\GuestController;
use App\Http\Controllers\backend\InvestController;
use App\Http\Controllers\backend\SponsorController;
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

Route::get('/app-download', [HomeController::class, 'appDownload'])->name('app.download');

Route::get('/admin-login', [IndexController::class, 'login'])->name('admin.login');

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

    // search route
    Route::get('/search', [IndexController::class, 'search'])->name('search');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// all settings route start //
Route::get('/general-setting', [SettingsController::class, 'index'])->name('general.setting');
Route::post('/setting-update', [SettingsController::class, 'update'])->name('setting.update');

Route::get('/email-setting', [SettingsController::class, 'emailSetting'])->name('email.setting');
Route::post('/email-update', [SettingsController::class, 'emailUpdate'])->name('email.update');

Route::get('application-cache-clear', [SettingsController::class, 'cacheClear'])->name('application.cache.clear');
// all settings route end //


// all event route start //
Route::get('/get-event-datetime', [EventController::class, 'getEventDate']);
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/add-event', [EventController::class, 'create'])->name('create.event');
Route::post('/add-event', [EventController::class, 'store'])->name('store.event');
Route::get('/edit-event/{id}', [EventController::class, 'edit'])->name('edit.event');
Route::post('/edit-event/{id}', [EventController::class, 'update'])->name('update.event');
Route::post('/destroy-event/{id}', [EventController::class, 'destroy'])->name('destroy.event');

Route::get('/event-detail', [EventController::class, 'eventDetail'])->name('event.detail');
// all event route end //


// all event schedule route start //
Route::get('/event-schedule', [EventScheduleController::class, 'index'])->name('event.schedule');
Route::get('/add-event-schedule', [EventScheduleController::class, 'create'])->name('create.event.schedule');
Route::post('/add-event-schedule', [EventScheduleController::class, 'store'])->name('store.event.schedule');
Route::get('/edit-event-schedule/{id}', [EventScheduleController::class, 'edit'])->name('edit.event.schedule');
Route::post('/edit-event-schedule/{id}', [EventScheduleController::class, 'update'])->name('update.event.schedule');
Route::post('/destroy-event-schedule/{id}', [EventScheduleController::class, 'destroy'])->name('destroy.event.schedule');
// all event schedule route end //


// all event guest route start //
Route::middleware('auth')->group(function () {
    Route::get('/guests', [GuestController::class, 'index'])->name('guests');
    Route::get('/add-guest', [GuestController::class, 'create'])->name('create.guest');
    Route::post('/add-guest', [GuestController::class, 'store'])->name('store.guest');
    Route::get('/edit-guest/{id}', [GuestController::class, 'edit'])->name('edit.guest');
    Route::post('/edit-guest/{id}', [GuestController::class, 'update'])->name('update.guest');
    Route::post('/destroy-guest/{id}', [GuestController::class, 'destroy'])->name('destroy.guest');
});
// all event guest route end //


// all review route start //
Route::middleware('auth')->group(function () {
    Route::get('/reviews', [ReviewController::class, 'showReviews'])->name('reviews');
    Route::get('/review-status/{review}', [ReviewController::class, 'changeStatus'])->name('change.review.status');
});

Route::get('/event-review', [ReviewController::class, 'index'])->name('event.review');
Route::post('/event-review', [ReviewController::class, 'store'])->name('post.review');
// all review route end //


// all contact route start //
Route::middleware('auth')->group(function () {
    Route::get('/contact-list', [ContactController::class, 'showContact'])->name('contact.list');
    Route::get('/contact-view/{id}', [ContactController::class, 'view'])->name('contact.view');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('post.contact');
// all contact route end //


// all team route start //
Route::middleware('auth')->group(function () {
    Route::get('/team-list', [TeamController::class, 'teamList'])->name('team.list');
    Route::get('/add-team', [TeamController::class, 'create'])->name('create.team');
    Route::post('/add-team', [TeamController::class, 'store'])->name('store.team');
    Route::get('/edit-team/{id}', [TeamController::class, 'edit'])->name('edit.team');
    Route::post('/edit-team/{id}', [TeamController::class, 'update'])->name('update.team');
    Route::post('/destroy-team/{id}', [TeamController::class, 'destroy'])->name('destroy.team');
});

Route::get('/team', [TeamController::class, 'index'])->name('team');
// all team route end //


// all register route start //
Route::get('/register-list', [EventRegisterController::class, 'index'])->name('register.list');
Route::get('/ticket-edit/{id}', [EventRegisterController::class, 'edit'])->name('ticket.edit');
Route::post('/ticket-edit/{id}', [EventRegisterController::class, 'update'])->name('ticket.update');
Route::post('/payment-status-change/{eventRegister}', [EventRegisterController::class, 'changeStatus'])->name('payment.status.change');
Route::get('/student-detail/{id}', [EventRegisterController::class, 'showStudentDetail'])->name('student.detail');

Route::get('/ticket', [EventRegisterController::class, 'create'])->name('ticket');
Route::post('/ticket-create', [EventRegisterController::class, 'store'])->name('ticket.post');
Route::get('/all-registration', [EventRegisterController::class, 'allReg'])->name('all.registration');
// all register route end //


// all gallery route start //
Route::middleware('auth')->group(function () {
    Route::get('/gallery-list', [GalleryController::class, 'galleryList'])->name('gallery.list');
    Route::get('/add-gallery', [GalleryController::class, 'create'])->name('create.gallery');
    Route::post('/add-gallery', [GalleryController::class, 'store'])->name('store.gallery');
    Route::post('/destroy-gallery/{id}', [GalleryController::class, 'destroy'])->name('destroy.gallery');
});

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
// all gallery route end //


// all donation route start //
Route::middleware('auth')->group(function () {
    Route::get('/donations', [DonationController::class, 'index'])->name('donations');
    Route::get('/add-donation', [DonationController::class, 'create'])->name('create.donation');
    Route::post('/add-donation', [DonationController::class, 'store'])->name('store.donation');
    Route::get('/edit-donation/{id}', [DonationController::class, 'edit'])->name('edit.donation');
    Route::post('/edit-donation/{id}', [DonationController::class, 'update'])->name('update.donation');
    Route::post('/destroy-donation/{id}', [DonationController::class, 'destroy'])->name('destroy.donation');
});

Route::get('/our-doner', [DonationController::class, 'donerShow'])->name('our.doner');
// all donation route end //


// all investment route start //
Route::middleware('auth')->group(function () {
    Route::get('/invests', [InvestController::class, 'index'])->name('invests');
    Route::get('/add-investment', [InvestController::class, 'create'])->name('create.investment');
    Route::post('/add-investment', [InvestController::class, 'store'])->name('store.investment');
    Route::get('/edit-investment/{id}', [InvestController::class, 'edit'])->name('edit.investment');
    Route::post('/edit-investment/{id}', [InvestController::class, 'update'])->name('update.investment');
    Route::post('/destroy-investment/{id}', [InvestController::class, 'destroy'])->name('destroy.investment');
});
// all investment route end //


// all sponsor route start //
Route::middleware('auth')->group(function () {
    Route::get('/sponsors', [SponsorController::class, 'index'])->name('sponsors');
    Route::get('/add-sponsor', [SponsorController::class, 'create'])->name('create.sponsor');
    Route::post('/add-sponsor', [SponsorController::class, 'store'])->name('store.sponsor');
    Route::get('/edit-sponsor/{id}', [SponsorController::class, 'edit'])->name('edit.sponsor');
    Route::post('/edit-sponsor/{id}', [SponsorController::class, 'update'])->name('update.sponsor');
    Route::post('/destroy-sponsor/{id}', [SponsorController::class, 'destroy'])->name('destroy.sponsor');
});
// all sponsor route end //