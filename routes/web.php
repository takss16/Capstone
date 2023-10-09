<?php

use App\Models\Patient;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\MedicineNameController;
use App\Http\Controllers\RegistrationController;

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

// Route::middleware(['auth'])->group(function (){
//     Route::get('/index', function () {
//         return view('index');
//     })->name('index');





// });

Route::get('/index', [PatientController::class, 'index'])->name('index');
Route::get('/creates', [PatientController::class, 'create'])->name('create');

Route::get('/records', [PatientController::class, 'records'])->name('records');
Route::post('/patients', [PatientController::class, 'store'])->name('store');



Route::get('/', function () {
    return view('frontend/landing');
})->name('landing');



Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('edit');
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');

Route::get('/search', [PatientController::class, 'searchPatients'])->name('searchPatients');

Route::get('/patients/{id}/delete', [PatientController::class, 'delete'])->name('delete');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('destroy');

//diplay account 
Route::get('/accounts', [PatientController::class, 'viewAccounts'])->name('accounts');


Route::get('/patients/{id}/maternal', [PatientController::class, 'showMaternalRecord'])->name('maternal');
Route::post('/patients/{id}/maternalrecord', [PatientController::class, 'storeMaternalRecord'])->name('storeMaternalRecord');

// Show the edit form for maternal record
Route::get('/patients/{id}/maternal/editmaternal', [PatientController::class, 'editMaternalRecord'])->name('editMaternalRecord');
Route::put('/patients/{id}/updatematernal', [PatientController::class, 'updateMaternalRecord'])->name('updateMaternalRecord');

Route::get('/patients/{id}/deleteMaternal', [PatientController::class, 'showDeleteConfirmation'])->name('showDeleteConfirmation');
Route::delete('/patients/{id}/maternalrecord/{maternalRecordId}', [PatientController::class, 'deleteMaternalRecord'])->name('deleteMaternalRecord');
Route::get('/patients/{id}/maternal/print', [PatientController::class, 'printMaternalRecord'])->name('printMaternalRecord');


Route::post('/patients/{id}/baby', [PatientController::class, 'storeBabyInformation'])->name('storeBabyInformation');
// web.php
Route::get('/patients/{id}/child', [PatientController::class, 'showChildForm'])->name('child');
Route::get('/patients/{id}/child/editBaby', [PatientController::class, 'editbaby'])->name('editBaby');
Route::put('/patients/{id}/updatebaby', [PatientController::class, 'updatebaby'])->name('updateBaby');;

Route::get('/confirm-delete-baby/{id}/{babyId}', [PatientController::class, 'confirmDeleteBaby'])->name('confirmDeleteBaby');
Route::delete('/delete-baby/{id}/{babyId}', [PatientController::class, 'deleteBabyRecord'])->name('deleteBabyRecord');

Route::get('/patients/{id}/babies/{babyId}/print', [PatientController::class, 'printBaby'])->name('printBaby');

Route::get('/patients/{id}/checkup', [PatientController::class, 'showCheckupForm'])->name('checkup');
Route::get('/patients/{id}/checkup-med', [PatientController::class, 'showCheckup'])->name('checkupmed');
Route::get('/patients/{id}/checkup-history', [PatientController::class, 'checkupHistory'])->name('checkupHistory');



Route::post('/patients/{id}/store-checkup', [PatientController::class, 'storeCheckup'])->name('storeCheckup');
Route::delete('/checkups/{checkupId}/delete',  [PatientController::class, 'deleteCheckup'])->name('deleteCheckup');

// routes/web.php
Route::post('/checkup/{id}/add-medicine', [PatientController::class, 'addMedicine'])->name('addMedicine');

Route::post('/patients/{id}/checkup/{checkupId}/update', [PatientController::class, 'updateCheckup'])->name('updateCheckup');
Route::get('/patients/{id}/medicine/{medicineId}/delete', [PatientController::class, 'deleteMedicine'])->name('deleteMedicine');

Route::get('/patients/{id}/checkup/{checkupId}/print', [PatientController::class, 'ShowPrintCheckup'])->name('patient.printCheckup');

Route::get('/patients/{id}/admission', [PatientController::class, 'showAdmissionForm'])->name('addmit');
Route::post('/patients/{id}/admission', [PatientController::class, 'storeAdmission'])->name('storeAdmission');

Route::get('/patients/{id}/edit-admission', [PatientController::class, 'editAdmissionForm'])->name('editAdmissionForm');
Route::post('/patients/{id}/update-admission', [PatientController::class, 'updateAdmission'])->name('updateadmission');

Route::delete('/patients/{id}/delete-admission', [PatientController::class, 'deleteAdmission'])->name('deleteAdmission');
Route::get('/patients/{id}/print-admission', [PatientController::class, 'printAdmission'])->name('printAdmission');
// routes/web.php


//for billing routes


// Routes for item-related operations
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

// Routes for package-related operations
Route::get('/packages/create', [ItemController::class, 'createPackage'])->name('packages.create');
Route::post('/packages', [ItemController::class, 'storePackage'])->name('packages.store');

Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

Route::put('/packages/{package}', [ItemController::class, 'updatePackage'])->name('packages.update');
Route::delete('/packages/{package}', [ItemController::class, 'destroyPackage'])->name('packages.destroy');



Route::get('/checkout/{patientId}', [ItemController::class, 'checkout'])->name('checkout');
Route::post('/billing/{patientId}', [ItemController::class, 'bill'])->name('billing');

Route::get('/print-bill-preview/{patientId}', [ItemController::class, 'printBillPreview'])->name('printBillPreview');

Route::get('/discharge-bill-preview/{patientId}', [ItemController::class, 'BillPreview'])->name('BillPreview');

Route::get('/items/select-patient', [ItemController::class, 'selectPatient'])->name('items.select_patient');


Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/patients/{id}/view-record', [PatientController::class, 'Viewrecord'])->name('ViewRecord');

Route::post('/add-medicine-name', [MedicineNameController::class, 'store'])->name('addMedicineName');
Route::delete('/delete-medicine-name/{id}', [MedicineNameController::class, 'destroy'])->name('deleteMedicineName');


Route::post('/frequencies', [MedicineNameController::class, 'storeFrequency'])->name('frequencies.store');
Route::delete('/frequencies/{id}', [MedicineNameController::class, 'destroyFrequency'])->name('frequencies.destroy');

Route::post('dosages', [MedicineNameController::class, 'storeDosage'])->name('dosages.store');
Route::delete('dosages/{dosage}', [MedicineNameController::class, 'destroyDosage'])->name('dosages.destroy');

Route::get('/patientRefer', [PatientController::class, 'referral'])->name('referral');
Route::get('/patients/{id}/refferal', [PatientController::class, 'ReferralForm'])->name('refferalForm');
Route::post('/dischargeAllRecords/{id}', [PatientController::class, 'dischargeAllRecords'])->name('record.dischargeAll');
Route::get('/appointment/info/{id}', [AppointmentController::class, 'getAppointmentInfo'])->name('appointment.info');
Route::get('/showAppointment', [PatientController::class, 'showAppointment'])->name('showAppointment');


Route::delete('/appointments/{id}',[AppointmentController::class, 'destroyAppointment'])->name('appointments.destroy');
Route::post('/reset-account/{id}', [PatientController::class, 'resetAccount'])->name('reset.account');





Route::prefix('account')->group(function () {


    // Account login form (add this)
    Route::get('/account-login', [PatientAuthController::class, 'showLoginForm'])->name('account.login');

    // Handle account login (add this)
    Route::post('/account-login', [PatientAuthController::class, 'login'])->name('account.login.submit');
    Route::get('/patient/dashboard', [PatientAuthController::class, 'dashboard'])->name('patient.dashboard');
    Route::get('/patient/reminders', [PatientAuthController::class, 'Reminders'])->name('patient.reminders');

    Route::get('account/patient/view-medicine', [PatientAuthController::class, 'viewMedicine'])->name('patient.viewMedicine');
});



Route::get('/appointment-login', [PatientController::class, 'showLoginApp'])->name('appointment.login');

Route::get('login/google', [AppointmentController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [AppointmentController::class, 'handleGoogleCallback'])->name('login.google.callback');


Route::middleware(['web'])->group(function () {
    // Other authenticated routes...
    Route::post('/login', [AppointmentController::class, 'login'])->name('login.appointment');;


    // Route for displaying the user profile
    Route::get('/user-info',  [AppointmentController::class, 'showUserinfo'])->name('user.info');
    Route::get('/retrieve-appointment-patient',  [AppointmentController::class, 'retrieveAppointmentPatient'])->name('retrieve.appointment.patient');
    Route::post('/appointment-patient', [AppointmentController::class, 'store'])->name('appointment-patient.store');

    Route::put('/appointment-patient/{id}', [AppointmentController::class, 'update'])->name('appointment-patient.update');
    Route::get('/step2',  [AppointmentController::class, 'step2'])->name('step2');
    Route::post('/step2', [AppointmentController::class, 'storeStep2'])->name('appointment-patient.step2.store');
    Route::get('/combined-info', [AppointmentController::class, 'combinedInfo'])->name('combined.info');
    Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegistrationController::class, 'register'])->name('register.post');
    Route::get('/registration/success', function () {
        return view('auth.registration_success');
    })->name('registration.success');
    
    // Show the verification page
Route::get('/verify', [RegistrationController::class, 'showVerificationForm'])->name('verify');

// Handle the verification process
Route::post('/verify',[RegistrationController::class, 'verify'])->name('verify.post');

Route::post('/resend-otp', [RegistrationController::class, 'resendOTP'])->name('resend-otp');


});
