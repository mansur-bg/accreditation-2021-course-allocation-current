<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Staff\IndexController::class, 'index'])->name('index');
Route::get('/login', [App\Http\Controllers\Staff\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Staff\LoginController::class, 'staffLogin'])->name('login.post');

Route::group(['middleware' => ['auth:staff']], function () {

    Route::get('/dashboard', [App\Http\Controllers\Staff\DashboardController::class, 'index'])->name('dashboard');


    Route::get('/allocate-courses', [App\Http\Controllers\Staff\AllocationController::class, 'index'])->name('allocate-courses.index');
    Route::post('/allocate-courses', [App\Http\Controllers\Staff\AllocationController::class, 'store'])->name('allocate-courses.store');
    Route::get('/allocate-courses/template', [App\Http\Controllers\Staff\AllocationController::class, 'getAllocationTemplate'])->name('allocate-courses.get-template');

    Route::get('/allocate-courses/{course:code}/{staff}/{academic_session}/', [App\Http\Controllers\Staff\AllocationController::class, 'showStaffAllocation'])->name('allocate-courses.staff.show')->middleware('signed');

    Route::get('/courses', [App\Http\Controllers\Staff\CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [App\Http\Controllers\Staff\CourseController::class, 'show'])->name('courses.show');


    Route::get('/staff', [App\Http\Controllers\Staff\StaffController::class, 'index'])->name('staff.index');
    Route::post('/staff', [App\Http\Controllers\Staff\StaffController::class, 'store'])->name('staff.store')->middleware('signed');
    Route::post('/staff/photo/{staff}', [App\Http\Controllers\Staff\StaffController::class, 'photo'])->name('staff.photo');
    Route::get('/staff/{staff}', [App\Http\Controllers\Staff\StaffController::class, 'show'])->name('staff.show')->middleware('signed');

    Route::get('/staff/{staff}/edit', [App\Http\Controllers\Staff\StaffController::class, 'edit'])->name('staff.edit')->middleware('signed');
    Route::patch('/staff/{staff}', [App\Http\Controllers\Staff\StaffController::class, 'update'])->name('staff.update')->middleware('signed');

    Route::get('/allocate-letters', [App\Http\Controllers\Staff\CourseAllocationLetterController::class, 'index'])->name('allocate-letters.index');
    Route::get('/generate-allocate-letters', [App\Http\Controllers\Staff\CourseAllocationLetterController::class, 'generateAllocationLetters'])->name('allocate-letters.generate');
    Route::get('/generate-individual-allocate-letters', [App\Http\Controllers\Staff\CourseAllocationLetterController::class, 'generateIndividualAllocationLetters'])->name('individual-allocate-letters.generate');

    Route::post('logout', [App\Http\Controllers\Staff\LogoutController::class, 'index'])->name('logout');
});



//Route::get('/staff', function () {
//    return view('accreditation.staff.index');
//})->name('staff.index');;
//
//Route::get('/staff/login', function () {
//    return view('accreditation.staff.login');
//})->name('staff.login');
