<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inkbrands as InkBrandController;
use App\Http\Controllers\imageController as ControllersImageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\piercingController;



Auth::routes(['verify'=> true]);


Route::get('/about', function () {
    return view("about");
})->name('about');


Route::get('/calculator', function () {
    return view("calculator");
})->name('calculator');

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact')->middleware("auth","verified");
Route::get('/reservation', [App\Http\Controllers\HomeController::class, 'reservation'])->name('reservation')->middleware("auth","verified");
Route::get('/piercingsec', [App\Http\Controllers\HomeController::class, 'piercingsec'])->name('piercingsec')->middleware("auth","verified");
Route::get('/gallery', [App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');
Route::get('/inkbrand', [App\Http\Controllers\HomeController::class, 'inkbrand'])->name('inkbrand');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('welcome');




Route::get('/adinkbrands', [InkBrandController::class, 'index'])->name('inkbrands.index')->middleware("auth","verified");
Route::post('/adinkbrands', [InkBrandController::class, 'store'])->name('inkbrands.store')->middleware("auth","verified");
Route::get('/adinkbrands/create', [InkBrandController::class, 'create'])->name('inkbrands.create')->middleware("auth","verified");
Route::get('/adinkbrands/{id}/destroy', [InkBrandController::class, 'destroy'])->name('inkbrands.destroy')->middleware("auth","verified");


Route::get('/AdGallery', [ControllersImageController::class, "index"])->name('adminpanel.adgallery')->middleware("auth","verified");
Route::get('/Gallery/create', [ControllersImageController::class, 'create'])->name('adgallery.create')->middleware("auth","verified");
Route::get('/image/{id}/edit', [ControllersImageController::class, 'edit'])->name('adgallery.edit')->middleware("auth","verified");
Route::post('/Gallery/{id}/update', [ControllersImageController::class, 'update'])->name('updatephotos')->middleware("auth","verified");
Route::get('/image/{id}/description', [ControllersImageController::class, 'destroy'])->name('adgallery.destroy')->middleware("auth","verified");
 Route::prefix("image")->group(function () {
    Route::post("/adgallery.store", [ControllersImageController::class, 'store'])->name("adgallery.store")->middleware("auth","verified") ;
    
}); 

Route::get('/piercing', [piercingController::class, "index"])->name('piercing_sec')->middleware("auth","verified");
Route::get('/piercing/create', [piercingController::class, 'create'])->name('piercing.create')->middleware("auth","verified");
Route::get('/piercing/{id}/edit', [piercingController::class, 'edit'])->name('piercing.edit')->middleware("auth","verified");
Route::post('/piercing/{id}/update', [piercingController::class, 'update'])->name('piercing.update')->middleware("auth","verified");
Route::get('/pierc/{id}/description', [piercingController::class, 'destroy'])->name('piercing.destroy')->middleware("auth","verified");
 Route::prefix("piercing")->group(function () {
    Route::post("/piercing.store", [piercingController::class, 'store'])->name("piercing.store")->middleware("auth","verified") ;
    
}); 

Route::get('/testimonials', [TestimonialController::class, "index"])->name('testimonial.index');
Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create')->middleware("auth","verified");
Route::get('/testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit')->middleware("auth","verified");
Route::post('/testimonial/{id}/update', [TestimonialController::class, 'update'])->name('testimonial.update')->middleware("auth","verified");
Route::get('/testimonial/{id}/description', [TestimonialController::class, 'destroy'])->name('testimonial.destroy')->middleware("auth","verified");
 Route::prefix("testimonials")->group(function () {
    Route::post("/testimonial.store", [TestimonialController::class, 'store'])->name("testimonial.store")->middleware("auth","verified") ;
    
}); 


Route::get('/adtestimonials', [admin::class, "index"])->name('adtestimonial.index')->middleware("auth","verified");
Route::get('/testimonial/{id}/feedback', [admin::class, 'udestroy'])->name('atestimonial.destroy')->middleware("auth","verified");

Route::get('/reservation/{id}/edit', [AppointmentController::class, 'edit'])->name('reservation.edit')->middleware("auth","verified");
    Route::post("/reservation.store", [AppointmentController::class, 'store'])->name("reservation.store")->middleware("auth","verified") ;
    Route::get('/adreservation', [AppointmentController::class,'index'])->name('reservation.index')->middleware("auth","verified");
    Route::post('reservation/{id}/status', [AppointmentController::class, 'update'])->name('reservation.updateStatus')->middleware("auth","verified");
    Route::get('reservation/{id}/delete', [AppointmentController::class, 'destroy'])->name('reservation.destroy')->middleware("auth","verified");



Route::get('/user', [admin::class, 'adminusers'])->name('user')->middleware("auth","verified");
Route::get('/user/{id}/delete', [admin::class, 'destroy'])->name('user.destroy')->middleware("auth","verified");
Route::get("reservation/{id}/action" , [admin::class, 'resAction'])->name("reservation.action");