<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth', 'verified')
    ->name('adimn.')
    ->prefix('admin')
    ->group(function () {
        // metti qui le rotte protette da autenticazione di sistema
        // tutte le rotte devono condividere stesso nome e prefix  e il middleware
        // il nome sarà una roba tipo admin. cosi da concatenare altre rotte tutte con inizio adimn
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // name sarà admin.dashboard
    });
