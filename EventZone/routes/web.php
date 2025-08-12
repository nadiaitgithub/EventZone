<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public routes
Route::get('/', [EventController::class, 'index']);
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/event/{id}/order', [EventController::class, 'order'])->name('events.order');
Route::post('/event/{id}/order', [EventController::class, 'storeOrder'])->name('events.storeOrder');
Route::get('/event/{id}/payment-confirmation', [EventController::class, 'paymentConfirmation'])->name('events.paymentConfirmation');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');
    Route::resource('events', EventController::class);
});

//profile edit

Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update')->middleware('auth');

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');
    Route::post('/admin/events/{id}/approve', [AdminController::class, 'approve']);
    Route::post('/admin/events/{id}/reject', [AdminController::class, 'reject']);
    Route::delete('/admin/events/{id}', [AdminController::class, 'destroy']);
});
