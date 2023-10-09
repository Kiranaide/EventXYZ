<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', [EventController::class, 'index'])->middleware(['auth','api'])->name('dashboard');

Route::group(['middleware' => 'api',], function () {
    Route::post('/dashboard', [EventController::class, 'store']);
    Route::get('/dashboard', [EventController::class, 'index']);
    Route::get('/dashboard/{id}', [EventController::class, 'show']);
    Route::delete('/dashboard/{id}', [EventController::class, 'destroy']);
    Route::post('/dashboard/{id}', [EventController::class, 'attend']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
