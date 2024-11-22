<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\VerificationController;

use App\Http\Controllers\OtpController;

use Illuminate\Http\Request;
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


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// route::middleware('auth')->group(function () {
//     route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     route::delete('/profile', [ProfileController::class, 'destory'])->name('profile.destory');
// });





// verifikasi email

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::get('/verify-email', function () {
    return view('verify-email');
})->name('verify.email');

Route::post('/email/verification-notification', [VerificationController::class, 'send'])->name('verification.send');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/email/verify', function () {
    return view('auth.verify-email');

})->middleware('auth')->name('verification.notice');


// otp
Route::get('/otp/verify', [OtpController::class, 'showOtpForm'])->name('otp.verify');

Route::post('/otp/verify', [OtpController::class, 'verifyOtp'])->name('otp.verify.post');








require __DIR__. '/auth.php';

// // serach
Route::get('/search',[HomeController::class, 'search'])->name('search');
Route::get('/admin/search',[AdminController::class, 'search']);

// Routing untuk admin
Route::get('/home', [AdminController::class, 'index'])->middleware('auth')->name('home');
// route::get('/home',[AdminController::class,'admin_post'])->middleware('auth')->name('home');

// Routing untuk user
Route::get('/homepage', [HomeController::class, 'index'])->middleware(['auth','verified'])->name('home.homepage');

Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

// awal
// route::get('/homepage',[HomeController::class,'index'])->middleware('auth')->name('home.homepage');

// route::get('/home',[AdminController::class,'index'])->middleware('auth')->name('admin.show_post');


//halaman about
route::get('/about_us',[HomeController::class,'about_us'])->name('about_us');


Route::get('/post_page',[AdminController::class,'post_page'])->middleware('auth');

Route::post('/add_post',[AdminController::class,'add_post'])->middleware('auth');

Route::get('/show_post',[AdminController::class,'show_post'])->name('admin.show_post')->middleware('auth');

Route::post('/update_post/{id}',[AdminController::class,'update_post']);

Route::get('/delete_post/{id}',[AdminController::class,'delete_post']);

Route::get('/edit_page/{id}',[AdminController::class,'edit_page']);

Route::get('/post_details/{id}',[HomeController::class,'post_details']);

//halaman blog
Route::get('/post_details/{id}',[HomeController::class,'blog_details','descript']);

route::get('/blog',[HomeController::class,'blog'])->name('blog');


//halaman banner
route::get('/page_banner',[HomeController::class,'banner_one'])->name('page_banner');

Route::get('/create_post',[HomeController::class,'create_post'])->middleware('auth');

Route::post('/user_post',[HomeController::class,'user_post'])->middleware('auth');

// create post to my post
Route::get('/my_post',[HomeController::class,'my_post'])->name('home.my_post')->middleware('auth');

Route::get('/my_post_del/{id}',[HomeController::class,'my_post_del'])->middleware('auth');

Route::get('/post_update_page/{id}',[HomeController::class,'post_update_page'])->middleware('auth');

Route::post('/update_post_data/{id}',[HomeController::class,'update_post_data'])->middleware('auth');

Route::get('/accept_post/{id}',[AdminController::class,'accept_post'])->middleware('auth');

Route::get('/reject_post/{id}',[AdminController::class,'reject_post'])->middleware('auth');



















