<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/',[ContactController::class,'index']);
Route::post('/',[ContactController::class,'toCheckContact']);
Route::get('/check',[ContactController::class,'check']);
Route::post('/check',[ContactController::class,'regist']);
Route::get('/thanks',[ContactController::class,'thanks']);
Route::post('/thanks',[ContactController::class,'toHome']);
Route::get('/management',[ContactController::class,'management']);
Route::get('/management/serch',[ContactController::class,'searchContact']);
Route::post('/management/delete',[ContactController::class,'contactDelete']);