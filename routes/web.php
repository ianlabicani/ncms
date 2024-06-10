<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportDataController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientVisitController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::post('/add-patient', [PatientController::class, 'store'])->name('add.patient');
    Route::get('/show-patient-form', [PatientController::class, 'create'])->name('patient.form');
    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
    Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('patients.show');

    // profile
    Route::get('/profile/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('profile.changePasswordForm');
    Route::post('/profile/change-password', [ChangePasswordController::class, 'changePassword'])->name('profile.changePassword');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/add-visit', [PatientVisitController::class, 'store'])->name('patient-visit.store');


    // export
    Route::get('/Export/Patient-record', [ExportDataController::class, 'exportExcel'])->name('patient.excel-record');
    Route::get('/export-patients-pdf', [ExportDataController::class, 'exportPdf'])->name('patient.pdf-record');

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

