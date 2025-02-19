<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadPdfController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/patients/pdf', [DownloadPdfController::class, 'downloadAll'])->name('patients.pdf.general');