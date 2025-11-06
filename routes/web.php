<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Cashier;

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

/*Route::get('/post-job', \App\Livewire\PostJob::class)
    ->middleware(['auth'])
    ->name('post.job');*/

Route::get('/post-job', function () {
    return view('create-job-direct');
})->middleware(['auth'])->name('post.job');

Route::get('/select-package', function () {
    return view('main-packages');
})->name('select.package');

Route::get('/checkout/success', function () {
    return view('main-success');
})->name('checkout.success');

Route::get('user/user-applications', function () {
    return view('user-applications');
})->name('user.applications');

Route::get('/my-job-posts', function () {
    return view('my-job-posts');
})->middleware(['auth'])->name('my.job.posts');

Route::get('/users-list', function () {
    return view('user-list');
})->middleware(['auth'])->name('users.list');

Route::get('/edit-job/{jobId}', function ($jobId) {
    return view('edit-my-job-posts', compact('jobId'));
})->middleware(['auth'])->name('edit-job');

Route::get('/admin/job-management', function () {
    return view('admin.job-management');
})->middleware(['auth', 'can:is-admin'])->name('admin.job.management');

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
        Job::where('id', $jobId)->update(['status' => 'active']);
    } else {
        // Payment was not successful, handle accordingly
    }

    return view('checkout.success');
})->name('checkout.success');

Route::post('/stripe/webhook', function (Request $request) {
    $payload = $request->getContent();
    $event = $payload ? json_decode($payload, true) : [];
    Log::info('Stripe Webhook Received: ', $event);

    if ($event['type'] == 'payment_intent.succeeded') {
        $paymentIntent = $event['data']['object'];
        $metadata = $paymentIntent['metadata'] ?? [];
        $jobId = isset($metadata['job_id']) ? $metadata['job_id'] : null;

        if ((config('app.env') === 'production' && $jobId) || config('app.env') === 'local') {
            if (empty($jobId)) {
                $jobId = Job::latest()->first()->id;
            }
            Job::where('id', $jobId)->update(['status' => 'active']);
            Log::info("Job ID {$jobId} status updated to Active.");
        } else {
            Log::warning('No job_id found in payment intent metadata.');
        }
    }

    return response()->json(['status' => 'success']);
})->name('stripe.webhook');

Route::get('/checkout/cancel', function () {
    return view('checkout.cancel');
})->name('checkout.cancel');

Route::get('/ai-test', function () {
    return view('ai-test');
})->middleware(['auth'])->name('ai.test');

require __DIR__.'/auth.php';
