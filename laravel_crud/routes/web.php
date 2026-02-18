<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');

Route::get('/register',[AuthController::class,'showRegister'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register.post');
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.post');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
Route::get('/students',[StudentController::class,('index')])->name('students.index');
Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
Route::post('students',[StudentController::class,'store'])->name('students.store');
Route::get('student/{student}',[StudentController::class,'show'])->name('student.show');
Route::get('student/{student}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::put('student/{student}',[StudentController::class,'update'])->name('student.update');
Route::delete('students/{student}',[StudentController::class,'destroy'])->name('student.destroy');
});
