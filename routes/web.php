<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

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

Route::get('/create', function () {
    return view('create');

})->name('create');

Route::get('/record', function () {
    return view('records');

})->name('records');

Route::get('/baby', function () {
    return view('babies');

})->name('babies');

Route::get('/', function () {
    return view('login');

})->name('login');

Route::get('/landing', function () {
    return view('landing');

})->name('landing');

Route::get('/account', function () {
    return view('accounts');

})->name('accounts');

Route::get('/bills', function () {
    return view('checkout');

})->name('checkout');

Route::get('/Patients', function () {
    return view('patients');

})->name('patients');

Route::get('/manage', function () {
    return view('items');

})->name('items');





