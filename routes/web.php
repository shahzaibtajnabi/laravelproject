<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Websitecontroller;
use App\Http\Controllers\DatabaseController;


    //  admin route
Route::get('/welcome/admin', [Admincontroller::class ,'adminindex'])->name('admin_index');
Route::get('/contactview', [Admincontroller::class ,'admincontact'])->name('insertcontact');



      // user route
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

    // contact post
Route::post('/contactsave',[Websitecontroller::class, 'storecontact'])->name('contactsave');





// Route::get('/check', [DatabaseController::class, 'getCustomerView'])->name('getCustomerView');

// Route::post('/customer-store',[DatabaseController::class, 'storeCustomers'])->name('customer-store');
