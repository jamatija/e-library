<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\GlobalVariableController;
use App\Http\Controllers\BindingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\SizeController;

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

Route::middleware(['auth', 'verified'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUDS
    Route::resource('/authors', AuthorController::class);
    Route::delete('authors/bulk-delete', [AuthorController::class, 'bulkDelete'])->name('authors.bulkDelete');
    Route::resource('/books', BookController::class);
    Route::get('/books-specifications', [BookController::class, 'bookSpecifications'])->name('books.specs');


    // SETTINGS
    Route::get('/settings', [GlobalVariableController::class, 'index'])->name('settings.index');
    Route::resource('/global_variables', GlobalVariableController::class);
    Route::resource('/bindings', BindingController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/genres', GenreController::class);
    Route::resource('/languages', LanguageController::class);
    Route::resource('/publishers', PublisherController::class);
    Route::resource('/scripts', ScriptController::class);
    Route::resource('/sizes', SizeController::class);

});

require __DIR__ . '/auth.php';
