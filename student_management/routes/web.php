<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\Trade;

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
    return redirect('/login');
});
Route::get('/dashboard', function () {
    return redirect('/Dashboard');
});

//Student Route Sections
Route::get('/Dashboard' , [Student::class , 'home'])->middleware('auth');
Route::get('/Dashboard/AddStudent' , [Student::class , 'AddStudent'])->middleware('auth');
Route::get('/Dashboard/UpdateStudent/{id}' , [Student::class , 'UpdateStudent'])->middleware('auth');
Route::get('/Dashboard/AllDeletedStudent' , [Student::class , 'DeletedStudent'])->middleware('auth');
Route::post('/Dashboard/StudentAddAction' , [Student::class , 'AddStudentAction'])->middleware('auth');
Route::post('/Dashboard/StudentUpdateAction/{id}' , [Student::class , 'UpdateStudentAction'])->middleware('auth');
Route::get('/Dashboard/StudentDeleteAction/{id}' , [Student::class , 'DeleteStudentAction'])->middleware('auth');
Route::get('/Dashboard/restoreStudent/{id}' , [Student::class , 'restoreBack'])->middleware('auth');
Route::post('/Dashboard/changePass/{id}' , [Student::class , 'ChangePass'])->middleware('auth');

//Teacher Route Section
Route::get('/Dashboard/AllTeacher' , [Teacher::class , 'home'])->middleware('auth');
Route::get('/Dashboard/AddTeacher' , [Teacher::class , 'AddTeacher'])->middleware('auth');
Route::get('/Dashboard/UpdateTeacher/{id}' , [Teacher::class , 'UpdateTeacher'])->middleware('auth');
Route::get('/Dashboard/AllDeletedTeacher' , [Teacher::class , 'DeletedTeacher'])->middleware('auth');
Route::post('/Dashboard/TeacherAddAction/' , [Teacher::class , 'AddTeacherAction'])->middleware('auth');
Route::post('/Dashboard/TeacherUpdateAction/{id}' , [Teacher::class , 'UpdateTeacherAction'])->middleware('auth');
Route::get('/Dashboard/TeacherDeleteAction/{id}' , [Teacher::class , 'DeleteTeacherAction'])->middleware('auth');
Route::get('/Dashboard/restoreTeacher/{id}' , [Teacher::class , 'restoreBack'])->middleware('auth');

//Trade Route Section
Route::get('/Dashboard/AddTrade' , [Trade::class , 'AddTrade'])->middleware('auth');
Route::get('/Dashboard/UpdateTrade/{id}' , [Trade::class , 'UpdateTrade'])->middleware('auth');
Route::get('/Dashboard/StudentByTrade/{id}' , [Trade::class , 'StudentByTrade'])->middleware('auth');
Route::get('/Dashboard/DeletedStudentByTrade/{id}' , [Trade::class , 'DeletedStudentByTrade'])->middleware('auth');
Route::get('/Dashboard/AllDeletedTrade' , [Trade::class , 'DeletedTrade'])->middleware('auth');
Route::post('/Dashboard/TradeAddAction' , [Trade::class , 'AddTradeAction'])->middleware('auth');
Route::post('/Dashboard/TradeUpdateAction/{id}' , [Trade::class , 'UpdateTradeAction'])->middleware('auth');
Route::get('/Dashboard/TradeDeleteAction/{id}' , [Trade::class , 'DeleteTradeAction'])->middleware('auth');
Route::get('/Dashboard/restoreTrade/{id}' , [Trade::class , 'restoreTrade'])->middleware('auth');

require __DIR__.'/auth.php';
