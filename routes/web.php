<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('home');  
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});


Route::get('/transaction', function () {
    return view('transaction'); 
})->name('transaction');


Route::get('/donate', function () {
    return view('donate'); 
})->name('donate');

Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route::get('/browse', function () {
    return view('browse'); 
})->name('browse');


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
