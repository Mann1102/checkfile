<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

Route::get('/upload', [UploadController::class, 'index'])->name('upload');
Route::post('/submit-form', [UploadController::class, 'submitForm'])->name('submit.form');


Route::get('/verify_data', [AdminController::class, 'verifyData'])->name('verify.data');

Route::get('/verify/search', [AdminController::class, 'searchData'])->name('verify.search');

Route::get('/all/data', [AdminController::class, 'showAllData'])->name('all.data');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/register', [RegisterController::class, 'register'])->name('register');

require __DIR__.'/auth.php';
