<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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

        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->middleware(['auth', 'verified'])->name('dashboard');

        Route::get('/', [StudentController::class, 'index'])->name('index');

        Route::prefix('students')->name('students.')->controller(StudentController::class)->group(function () {
                Route::get('/view', 'student')->name('view');                     // Add orm
                Route::get('/edit/{id}', 'student_edit_form')->name('edit.form');  // Edit Form
                Route::put('/edit', 'student_edit')->name('edit');                 // Update
                Route::post('/add', 'student_add')->name('add');                   // Store
                Route::delete('/delete/{id}', 'student_delete')->name('delete');   // Delete
            });

        Route::prefix('users')->name('users.')
        ->controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('index'); //show users data
            Route::get('/add', 'create')->name('add.form'); // show add form
            Route::post('/add', 'store')->name('add'); // add data 
            Route::get('/edit/{id}', 'edit')->name('edit.form'); //show edit form
            Route::put('/edit/{id}', 'update')->name('edit'); // edit data
            Route::delete('/delete/{id}', 'destroy')->name('delete'); //delete data
        });

    Route::resource('post',PostController::class);

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
