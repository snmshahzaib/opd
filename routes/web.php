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
Route::get('/home', 'HomeController@index')->name('home')->middleware(PatientArea::class);
Route::prefix('admin')->middleware('admin_area')->group(function(){
    Route::get('/dashboard', 'HomeController@admin');
    Route::get('/departments', 'DepartmentController@index');
    Route::post('/add_department', 'DepartmentController@store');
    Route::get('/department_delete/{id}', 'DepartmentController@destroy');
    Route::post('/department_update/{id}', 'DepartmentController@update')->name('department.update');
    Route::post('/add_doctor', 'DepartmentController@add_Doctor')->name('department.add_doctor');
    // ...................
    // Route::get('/doctors', 'DepartmentController@index');
});

Route::prefix('doctor')->middleware('doctor_area')->group(function(){
    Route::get('/dashboard', 'HomeController@doctor');
});
// ----------------------------------------------------------------------
// Route::get('patient', function () {
//     return view('patient');
// })->middleware(PatientArea::class);

// Route::get('doctor', function () {
//     return view('doctor');
// })->middleware(DoctorArea::class);

// Route::middleware(['doctor_area'])->group(function () {
//     Route::get('doctor', 'HomeController@doctor');
//     Route::get('patient', 'HomeController@patient');
// });
// ------------------------------------------------------------------------