<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminArea;
use App\Http\Middleware\DoctorArea;
use App\Http\Middleware\PatientArea;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Route::prefix('admin')->middleware('admin_area')->group(function(){
//     Route::get('/home', 'HomeController@index')->name('home');
// });

// Route::get('admin', function () {
//     return view('admin');
// })->middleware('admin_area');
Route::get('admin', function () {
    return view('admin');
})->middleware(AdminArea::class);

Route::get('patient', function () {
    return view('patient');
})->middleware(PatientArea::class);

// Route::get('doctor', function () {
//     return view('doctor');
// })->middleware(DoctorArea::class);

Route::middleware(['doctor_area'])->group(function () {
    Route::get('doctor', 'HomeController@doctor');
    Route::get('patient', 'HomeController@patient');
});