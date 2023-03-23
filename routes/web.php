<?php

use Illuminate\Support\Facades\Route;
use App\User; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/', function () {
    return view('welcome');
});
 
 

Auth::routes();

Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () { 
   Route::get('/search',[EmployeeController::class,'search']);
   Route::get('user/home', [HomeController::class, 'user'])->name('user.home')->middleware('user');
   Route::get('admin/home', [HomeController::class, 'admin'])->name('admin.home')->middleware('admin');
   Route::get('nonadmin/home', [HomeController::class, 'nonadmin'])->name('nonadmin.home')->middleware('nonadmin');
   Route::post('/employees/store',[EmployeeController::class, 'store'])->name('employees.store')->middleware('admin');
   Route::get('/employees/show/{id}',[EmployeeController::class, 'show'])->name('employees.show')->middleware('admin');
   Route::get('/employees/index',[EmployeeController::class, 'index'])->name('employees.index');
   Route::get('/employees/create',[EmployeeController::class, 'create'])->name('employees.create')->middleware('admin');
   Route::post('/employees/edit',[EmployeeController::class, 'update'])->name('employees.update')->middleware('admin');
   Route::get('/employees/edit/{id}',[EmployeeController::class, 'edit'])->name('employees.edit')->middleware('admin');
   Route::get('/users/index',[UserController::class, 'index'])->name('users.index')->middleware('user');
   Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('user');
   Route::post('/users/store', [UserController::class, 'store'])->name('users.store')->middleware('user');
   
});




