<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LogController;


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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [GuestController :: class, 'index'])
->name('guest.index');

Route::get('/log/show/{id}', [LogController :: class, 'show'])
->middleware(['auth', 'verified'])
->name('log.show');

Route::post('/store', [LogController :: class, 'store'])
->middleware(['auth', 'verified'])
->name('log.store');

Route ::get('/edit/{id}', [LogController :: class, 'edit'])
->middleware(['auth', 'verified'])
->name('log.edit');

Route ::put('/update/{id}', [LogController :: class, 'update'])
->middleware(['auth', 'verified'])
->name('log.update');

Route ::delete('/delete/{id}',[LogController :: class, 'delete'])
->middleware(['auth', 'verified'])
->name('delete');

Route:: delete('/delete/{id}/picture',[LogController :: class, 'deletePicture'])
->middleware(['auth', 'verified'])
->name('picture-delete');


Route::get('/create', [LogController :: class, 'create'])
->middleware(['auth', 'verified'])
->name('log.create');

require __DIR__.'/auth.php';
