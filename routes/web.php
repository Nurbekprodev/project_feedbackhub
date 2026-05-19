<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    $businesses = auth()->user()
        ->businesses()
        ->withCount('feedbacks')
        ->latest()
        ->get();

    return view('dashboard', compact('businesses'));
})->middleware(['auth'])->name('dashboard');


// =====================
// BUSINESS (OWNER SIDE)
// =====================
Route::middleware('auth')->group(function () {

    // Create business
    Route::get('/businesses/create', [BusinessController::class, 'create'])
        ->name('businesses.create');
    Route::post('/businesses', [BusinessController::class, 'store'])
        ->name('businesses.store');

    // Edit business
    Route::get('/businesses/{business}/edit', [BusinessController::class, 'edit'])
        ->name('businesses.edit');
    Route::patch('/businesses/{business}', [BusinessController::class, 'update'])
        ->name('businesses.update');

    // Show business
    Route::get('/businesses/{business}', [BusinessController::class, 'show'])
        ->name('businesses.show');

    // Delete business
    Route::delete('/businesses/{business}', [BusinessController::class, 'destroy'])
        ->name('businesses.destroy');

    // Download QR
    Route::get('/businesses/{business}/qr', [BusinessController::class, 'qr'])
        ->name('businesses.qr');
});


// =====================
// FEEDBACK (PUBLIC SIDE)
// =====================
Route::get('/f/{uuid}', [FeedbackController::class, 'show'])
    ->name('feedback.show');

Route::post('/f/{uuid}', [FeedbackController::class, 'store'])
    ->name('feedback.submit')
    ->middleware('throttle:10,1');

Route::patch('/feedbacks/{feedback}/status', [FeedbackController::class, 'updateStatus'])
    ->middleware('auth')
    ->name('feedbacks.status');

// =====================
// NOTIFICATIONS
// =====================
Route::post('/notifications/{notification}/read', function ($notification) {

    $notification = auth()->user()
        ->notifications()
        ->findOrFail($notification);

    $notification->markAsRead();

    return redirect()->route(
        'businesses.show',
        $notification->data['business_id']
    );

})->middleware('auth')->name('notifications.read');


// =====================
// REVIEW CONTROLLER
// =====================
Route::get('/review/google/{business}', [ReviewController::class, 'google'])
    ->name('review.google');

Route::get('/review/naver/{business}', [ReviewController::class, 'naver'])
    ->name('review.naver');


// =====================
// PROFILE
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';