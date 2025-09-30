<?php

use App\Livewire\Auth2\Login2;
use App\Livewire\Auth2\Register2;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/index', function () {
        return view('admin.index');
    })->name('admin.dashboard');
});

Route::get('/jobs', function () {
    return view('jobs');
})->name('jobs');

Route::get('/jobApplication', function () {
    return view('main-jobApply');
})->name('job.application');

Route::get('/companies', function () {
    return view('companies');
})->name('companies');

Route::get('/login2', Login2::class)->name('login2');
Route::get('/register2', Register2::class)->name('register2');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
