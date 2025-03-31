<?php


use App\Models\products;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\servicesconroller;
use App\Http\Controllers\Websitecontroller;
use App\Http\Controllers\DatabaseController;


    //  admin route
Route::get('/welcome/admin', [Admincontroller::class ,'adminindex'])->name('admin_index');
Route::get('/contactview', [Admincontroller::class ,'admincontact'])->name('insertcontact');
Route::post('/Appoinmentsend', [Admincontroller::class ,'sendAppoinment'])->name('Appoinmentsend');
Route::get('/Appoin', [Admincontroller::class ,'Appoin'])->name('Appoin');

    // Booking-products
 Route::get('/booking/view', [Admincontroller::class ,'booking'])->name('admin_booking');
 Route::post('/booking/delete{id}', [Admincontroller::class ,'bookingdelete'])->name('booking.delete');
Route::post('/booking/update/{id}', [Admincontroller::class, 'updatebooking'])->name('booking-update.post');
Route::get('/approve/booking', [Admincontroller::class ,'approvebook'])->name('approve.booking');
Route::get('/reject/booking', [Admincontroller::class ,'rejectbook'])->name('reject.booking');


    // Appoinment WORK

Route::post('/delete{id}', [Admincontroller::class ,'deleteid'])->name('delete');
Route::post('/update/{id}', [Admincontroller::class, 'updateAppoinment'])->name('appoinment-update.post');
Route::get('/approved', [Admincontroller::class ,'approveview'])->name('approve-view');
Route::get('/rejected', [Admincontroller::class ,'rejectview'])->name('reject-view');


      // user route
Route::get('/', [Websitecontroller::class, 'firstview'])->name('firstview');
Route::get('/about', [Websitecontroller::class, 'about'])->name('about');
Route::get('/Services', [Websitecontroller::class, 'services'])->name('Our-Services');
Route::get('/Pricing', [Websitecontroller::class, 'pricing'])->name('Pricing');
    // drowpdown
Route::get('/Appointment', [Websitecontroller::class, 'apointment'])->name('apointment');
Route::get('/Open_hours', [Websitecontroller::class, 'opening'])->name('opening');
Route::get('/Our_team', [Websitecontroller::class, 'team'])->name('team');
Route::get('/Testimonial', [Websitecontroller::class, 'testimonial'])->name('testimonial');
   // enddrowpdown
Route::get('/Contact', [Websitecontroller::class, 'Contact'])->name('Contact');
Route::get('/Shopping', [Websitecontroller::class, 'Shopping'])->name('Shopping');


    // contact post
Route::post('/contactsave',[Websitecontroller::class, 'storecontact'])->name('contactsave');

//   global create services
Route::get('/global/services', [servicesconroller::class ,'global'])->name('global-services');
Route::post('/global/post', [servicesconroller::class, 'globalpost'])->name('global-post');
Route::post('/services/delete{id}', [servicesconroller::class ,'deleteid'])->name('services-delete');

// Timing create
Route::get('/Timing', [servicesconroller::class ,'Time'])->name('global-time');
Route::post('/Days/Time', [servicesconroller::class ,'globaltime'])->name('set-time');
Route::post('/Days/Delete{id}', [servicesconroller::class ,'timedelete'])->name('time-delete');

//  products create
Route::get('/products', [servicesconroller::class ,'products'])->name('global-products');
Route::post('/products/Save', [servicesconroller::class ,'productspost'])->name('product-post');
Route::post('/products/delete{id}', [servicesconroller::class ,'productsdelete'])->name('product-delete');

// Cart create
Route::get('/Cart', [Websitecontroller::class ,'Cart'])->name('global.Cart');
Route::post('/add-to-cart', [Websitecontroller::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [Websitecontroller::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [Websitecontroller::class, 'remove'])->name('cart.remove');

//image tap
Route::get('/product/{id}', [Websitecontroller::class, 'show'])->name('product.show');
Route::post('/billing/to', [Websitecontroller::class, 'BillingPage'])->name('billing.page');
Route::post('/order/store', [Websitecontroller::class, 'store'])->name('order.store');

// tracking orders
Route::get('/track', [Websitecontroller::class, 'trackorder'])->name('track-order');
Route::get('/tracking', [Websitecontroller::class, 'track'])->name('track-page');

// Banner change

Route::get('/Banner', [servicesconroller::class ,'banner'])->name('banner-change');
Route::post('/Banner/change', [servicesconroller::class, 'bannerchange'])->name('banner.post');
Route::post('/Banner/Delete/{id}', [servicesconroller::class, 'bannerdelete'])->name('banner.delete');

// user Records
Route::get('/user/Record', [Admincontroller::class ,'Record'])->name('user-Records');



Fortify::loginView(function () {
    return view('auth.login');
});

Fortify::registerView(function () {
    return view('auth.register');
});

Fortify::requestPasswordResetLinkView(function () {
    return view('auth.forgot-password');
});

Fortify::resetPasswordView(function ($request) {
    return view('auth.reset-password', ['request' => $request]);
});








Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user(); // Ensure user is fetched correctly

        if(Auth::user()->role==1){
            return view('admindaashboard.index');
        }
        else{
            return view('website.layouts.index');
        }
    })->name('dashboard');
});