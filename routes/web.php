<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MailController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[EmployeeController::class,'index'])->name('Employee.index');
Route::resource('Employee',EmployeeController::class);
Route::get('sent-email',[MailController::class,'sendEmail']);
Route::get('search',[EmployeeController::class,'search'])->name('Employee.search');
Route::get('designation',[EmployeeController::class,'designation'])->name('Employee.designation');
