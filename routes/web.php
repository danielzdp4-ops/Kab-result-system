<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\LecturerAuthController;

Route::get('/', function(){ return view('welcome'); });

// ADMIN LOGIN
Route::get('/admin/login', [LecturerAuthController::class,'showLogin']);
Route::post('/admin/login', [LecturerAuthController::class,'login']);
Route::get('/lecturer/login', [LecturerAuthController::class,'showLogin']);
Route::post('/lecturer/login', [LecturerAuthController::class,'login']);
Route::get('/admin/logout', [LecturerAuthController::class,'logout']);
Route::get('/lecturer/logout', [LecturerAuthController::class,'logout']);

Route::get('/dashboard', function(){ return redirect('/students'); });
Route::get('/admin/dashboard', function(){ return redirect('/students'); });
Route::get('/lecturer/dashboard', function(){ return redirect('/students'); });

// ===== STUDENTS - COMPLETE =====
Route::get('/students', [StudentController::class,'index']);
Route::get('/students/create', [StudentController::class,'create']);
Route::post('/students', [StudentController::class,'store']);
Route::get('/students/{id}/edit', [StudentController::class,'edit']);
Route::get('/students/{id}', [StudentController::class,'show']);
Route::put('/students/{id}', [StudentController::class,'update']);
Route::delete('/students/{id}', [StudentController::class,'destroy']);

// ===== RESULTS - COMPLETE - THIS FIXES YOUR ERROR =====
Route::get('/results', [ResultController::class,'index']); // <-- THIS WAS MISSING - NOW ADDED
Route::get('/results/create', [ResultController::class,'create']);
Route::post('/results', [ResultController::class,'store']);
Route::get('/results/{id}/edit', [ResultController::class,'edit']);
Route::put('/results/{id}', [ResultController::class,'update']);
Route::delete('/results/{id}', [ResultController::class,'destroy']);

// STUDENT LOGIN
Route::get('/student/login', [StudentController::class,'showLogin']);
Route::post('/student/login', [StudentController::class,'login']);
Route::get('/student/dashboard', [StudentController::class,'dashboard']);
Route::get('/student/transcript', [StudentController::class,'transcript']);
Route::get('/student/logout', [StudentController::class,'logout']);
Route::get('/student/forgot', [StudentController::class,'showForgot']);
Route::post('/student/forgot', [StudentController::class,'handleForgot']);