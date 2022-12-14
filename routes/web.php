<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect()->to('/register');
    });
// User regitration & login
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'create'])->name('register');
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/keywords', [KeywordController::class, 'index'])->name('keywords');
    Route::post('/keywords', [KeywordController::class, 'store'])->name('search-keywords');

// Content Calendar - View All
    Route::get('/calendar', [CalendarController::class, 'getAll']);
    Route::post('/calendar/create', [CalendarController::class, 'create']);
    Route::get('/calendar/{day}', [CalendarController::class, 'getDay']);

});
// Get the SEMrush Keywords

// Individual Calendar Event

// Generate Content

// Payments
Route::get('/subscriptions', 'SubscriptionController@index')->name('subscriptions.index');
Route::post('/subscriptions', 'SubscriptionController@store')->name('subscriptions.store');
Route::post('/payment', 'PaymentController@createPayment');
Route::post('/subscription', 'PaymentController@createSubscription');
Route::post('/subscription/cancel', 'SubscriptionController@cancel')->name('subscription.cancel');

// Admin Users View
Route::resource('users', 'UserController');
Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@create');
Route::put('/users/{id}', 'UserController@update');
Route::delete('/users/{id}', 'UserController@delete');
Route::get('/user/{id}', 'UserController@show');

// Admin Keywords View

// Admin Content View

