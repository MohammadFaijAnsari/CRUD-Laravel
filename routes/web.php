<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('StudentForm');
})->name('studentForm');

Route::post('/save',[StudentController::class,'save_student'])->name('student.save');
Route::get('/show',[StudentController::class,'showStudentRecord'])->name('student.show');
Route::get('/delete/{id}',[StudentController::class,'deleteStudent'])->name('student.delete');
Route::get('/edit/{id}',[StudentController::class,'editStudent'])->name('student.edit');
Route::post('/update/{id}',[StudentController::class,'updateStudent'])->name('student.update');
