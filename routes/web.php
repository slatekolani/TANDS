<?php

use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\EventGalleryImageController as AdminEventGalleryImageController;
use App\Http\Controllers\Admin\EventRegistrationController as AdminEventRegistrationController;
use App\Http\Controllers\Admin\EventSectionController as AdminEventSectionController;
use App\Http\Controllers\Admin\GalleryImageController as AdminGalleryImageController;
use App\Http\Controllers\Admin\GrowthStatController as AdminGrowthStatController;
use App\Http\Controllers\Admin\HeroSlideController as AdminHeroSlideController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Admin\TeamMemberController as AdminTeamMemberController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [homeController::class, 'home']);

Route::get('home', [homeController::class, 'home'])->name('home');
Route::get('about', [homeController::class, 'about'])->name('about');
Route::get('gallery', [homeController::class, 'gallery'])->name('gallery');
Route::get('contactUs', [homeController::class, 'contactUs'])->name('contactUs');

// Legacy event URLs kept byte-identical for SEO/back-compat; each resolves
// its event by slug through the shared EventController@show template.
Route::get('EASDC', [EventController::class, 'show'])->name('EASDC')->defaults('slug', 'EASDC');
Route::get('EASDC2025', [EventController::class, 'show'])->name('EASDC2025')->defaults('slug', 'EASDC2025');
Route::get('ADC', [EventController::class, 'show'])->name('ADC')->defaults('slug', 'ADC');
Route::get('ADC2026', [EventController::class, 'show'])->name('ADC2026')->defaults('slug', 'ADC2026');
Route::get('TNDC2025', [EventController::class, 'show'])->name('TNDC2025')->defaults('slug', 'TNDC2025');
Route::get('TNDC2026', [EventController::class, 'show'])->name('TNDC2026')->defaults('slug', 'TNDC2026');
Route::get('TISDC2025', [EventController::class, 'show'])->name('TISDC2025')->defaults('slug', 'TISDC2025');

// Any new event created from the admin dashboard is reachable here automatically.
Route::get('events/{slug}', [EventController::class, 'show'])->name('event.show');

// Forms (replace the old Google Apps Script integrations)
Route::post('subscribe', [SubscriberController::class, 'store'])->name('subscribe.store');
Route::post('contact', [ContactMessageController::class, 'store'])->name('contact.store');
Route::post('events/{event}/register', [EventRegistrationController::class, 'store'])->name('event.register');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.attempt');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('events', AdminEventController::class);
        Route::post('events/{event}/sections', [AdminEventSectionController::class, 'store'])->name('events.sections.store');
        Route::put('events/{event}/sections/{section}', [AdminEventSectionController::class, 'update'])->name('events.sections.update');
        Route::delete('events/{event}/sections/{section}', [AdminEventSectionController::class, 'destroy'])->name('events.sections.destroy');
        Route::post('events/{event}/gallery', [AdminEventGalleryImageController::class, 'store'])->name('events.gallery.store');
        Route::put('events/{event}/gallery/{image}', [AdminEventGalleryImageController::class, 'update'])->name('events.gallery.update');
        Route::delete('events/{event}/gallery/{image}', [AdminEventGalleryImageController::class, 'destroy'])->name('events.gallery.destroy');
        Route::get('events/{event}/registrations', [AdminEventRegistrationController::class, 'index'])->name('events.registrations.index');
        Route::get('events/{event}/registrations/export', [AdminEventRegistrationController::class, 'export'])->name('events.registrations.export');
        Route::delete('events/{event}/registrations/{registration}', [AdminEventRegistrationController::class, 'destroy'])->name('events.registrations.destroy');

        Route::resource('gallery', AdminGalleryImageController::class)->except(['show']);
        Route::resource('hero-slides', AdminHeroSlideController::class)->except(['show']);
        Route::resource('team', AdminTeamMemberController::class)->except(['show']);
        Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);
        Route::resource('partners', AdminPartnerController::class)->except(['show']);
        Route::resource('programs', AdminProgramController::class)->except(['show']);
        Route::resource('activities', AdminActivityController::class)->except(['show']);
        Route::resource('growth-stats', AdminGrowthStatController::class)->except(['show']);

        Route::get('settings', [AdminSettingsController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [AdminSettingsController::class, 'update'])->name('settings.update');

        Route::get('subscribers', [AdminSubscriberController::class, 'index'])->name('subscribers.index');
        Route::get('subscribers/export', [AdminSubscriberController::class, 'export'])->name('subscribers.export');
        Route::delete('subscribers/{subscriber}', [AdminSubscriberController::class, 'destroy'])->name('subscribers.destroy');

        Route::get('contact-messages', [AdminContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('contact-messages/{contact_message}', [AdminContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::delete('contact-messages/{contact_message}', [AdminContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

        Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile/password', [AdminProfileController::class, 'updatePassword'])->name('profile.password');
    });
});
