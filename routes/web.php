<?php
 
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MahasiswaController; //add the ControllerNameSpace
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::resource("/mahasiswa", MahasiswaController::class);