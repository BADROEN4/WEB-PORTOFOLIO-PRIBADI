<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index');
});

Route::get('/resume', function () {
    return view('resume');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/contact', function () {
    return view('contact');
});

//Untuk Menampilkan Halaman Kontak
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');

//Untuk Memproses Pesan Kontak
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
