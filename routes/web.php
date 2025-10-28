<?php

use App\Models\Job;
use Laravel\Cashier\Cashier;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
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

Route::get('/select-package', function () {
    return view('main-packages');
})->name('select.package');

Route::get('/checkout/success', function () {
    return view('main-success');
})->name('checkout.success');

Route::get('user/user-applications', function () {
    return view('user-applications');
})->name('user.applications');

Route::get('/login2', function () {
    return view('main-login');
})->name('login2');

Route::get('/register2', function () {
    return view('main-register');
})->name('register2');

Route::get('/userDashboard', function () {
    return view('main-user-dashboard');
})->name('user.dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::get('/checkout', function () {
    $stripePriceId = 'price_1SI930Kw2TAzhKdqvPZOw76O'; // Replace with your actual price ID from Stripe
    $quantity = 1; // You can adjust the quantity as needed
    $jobId = request()->input('job_id');

    if (empty($jobId)) {
        return abort(404);
    }

    return request()->user()->checkout([$stripePriceId => $quantity], [
        'success_url' => route('checkout.success').'?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('checkout.cancel'),
        'metadata' => ['order_id' => auth()->id().'_'.time(), 'job_id' => $jobId],
    ]);
})->middleware(['auth'])->name('checkout');

Route::get('/checkout/success', function () {
    $sessionId = request('session_id');
    $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
    if ($session->payment_status === 'paid') {
        // Payment was successful, you can perform post-payment actions here
        $jobId = $session->metadata->job_id;
        Job::where('id', $jobId)->update(['status' => "Active"]);
    } else {
        // Payment was not successful, handle accordingly
    }

    return view('checkout.success');
})->name('checkout.success');

/* Route::get('/checkout/success', function () {
    return view('main-success');
})->name('checkout.success');*/

Route::get('/checkout/cancel', function () {
    return view('main-cancel');
})->name('checkout.cancel');

Route::post('/stripe/webhook', function (Request $request) {
    $sessionId = request('session_id');
    $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
    if ($session->payment_status === 'paid') {
        // Payment was successful, you can perform post-payment actions here
    } else {
        // Payment was not successful, handle accordingly
    }
    Log::info($request->all());
})->name('stripe.webhook');

Route::get('/ai-test', function () {
    return view('ai-test');
})->middleware(['auth'])->name('ai.test');

require __DIR__.'/auth.php';
