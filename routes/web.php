<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Websitecontroller;
use App\Http\Controllers\DatabaseController;

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

Route::get('/', [Websitecontroller::class, 'firstview'])->name('firstview');
Route::get('/about', [Websitecontroller::class, 'about'])->name('about');
Route::get('/Services', [Websitecontroller::class, 'services'])->name('Our-Services');
Route::get('/Pricing', [Websitecontroller::class, 'pricing'])->name('Pricing');
    // drowpdown
Route::get('/Apointment', [Websitecontroller::class, 'apointment'])->name('apointment');
Route::get('/Open_Hours', [Websitecontroller::class, 'opening'])->name('opening');
Route::get('/Our_Team', [Websitecontroller::class, 'team'])->name('team');
Route::get('/Testimonial', [Websitecontroller::class, 'testimonial'])->name('testimonial');
   // enddrowpdown
Route::get('/Contact', [Websitecontroller::class, 'Contact'])->name('Contact');

// Route::get('/customers', [DatabaseController::class , 'getCustomerView']);

// Route::post('/customers', [DatabaseController::class, 'storeCustomers'])->name('customer-store');