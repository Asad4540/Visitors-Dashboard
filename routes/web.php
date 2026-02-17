<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('app'); // Your welcome / registration page
});

/*
|--------------------------------------------------------------------------
| Visitor Form Submission (Public)
|--------------------------------------------------------------------------
*/

Route::post(
    '/visitors',
    [VisitorController::class, 'store']
)->name('visitors.store');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get(
        '/dashboard',
        [VisitorController::class, 'dashboard']
    )->name('dashboard');

    // Visitors Management Page
    Route::get(
        '/visitors-management',
        [VisitorController::class, 'index']
    )->name('visitorsManagement');

    // Update Visitor Status (AJAX)
    Route::post(
        '/visitors/{visitor}/status',
        [VisitorController::class, 'updateStatus']
    )->name('visitors.updateStatus');

});


require __DIR__ . '/auth.php';
