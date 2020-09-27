<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatoController;



// Route::get('/welcome', function () {
//     return view('welcome');
// });


Route::get('/', [DatoController::class,'index'])->name('index');

Route::get('/dato/create', [DatoController::class,'create'])->name('create');

Route::post('/dato', [DatoController::class,'store'])->name('store');

Route::post('/dato/show', [DatoController::class,'show'])->name('show');

// Route::get('/datoprueba', [Dato::class,'index'])->name('index');


