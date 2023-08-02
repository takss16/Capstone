<?php

use App\Models\Patient;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\patientController;

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

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/creates', [PatientController::class, 'create'])->name('create');

Route::get('/records', [PatientController::class, 'records'])->name('records');
Route::post('/patients', [PatientController::class, 'store'])->name('store');

Route::get('/baby', function () {
    return view('babies');

})->name('babies');

Route::get('/', function () {
    return view('login');

})->name('login');

Route::get('/landing', function () {
    return view('landing');

})->name('landing');


Route::get('/bills', function () {
    return view('checkout');

})->name('checkout');

Route::get('/Patients', function () {
    return view('patients');

})->name('patients');

Route::get('/manage', function () {
    return view('items');

})->name('items');

// Route::get('/maertals', function () {
//     return view('maternal');

// })->name('maternal');

Route::get('/child', function () {
    return view('child');

})->name('child');

Route::get('/addmission', function () {
    return view('addmit');

})->name('addmit');


Route::get('/check-up', function () {
    return view('checkup');

})->name('checkup');

Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('edit');
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');

Route::get('/search', [PatientController::class, 'searchPatients'])->name('searchPatients');

Route::get('/patients/{id}/delete', [PatientController::class, 'delete'])->name('delete');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('destroy');

//diplay account 
Route::get('/accounts', [PatientController::class, 'viewAccounts'])->name('accounts');


Route::get('/patients/{id}/maternal-records', [PatientController::class, 'showMaternalRecordForm'])->name('maternalRecordForm');
Route::post('/patients/{id}/maternal-records', [PatientController::class, 'storeMaternalRecord'])->name('storeMaternalRecord');

// Route::get('/maternal/{id}', [PatientController::class, 'show'])->name('maternal');






