<?php

use Illuminate\Support\Facades\Route;

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


/////////////////////////////////////Lab 3//////////////////////////////////


Route::get('school/students', 'App\Http\Controllers\SchoolController@allStudents')->name('students.all')->middleware('auth');
Route::get('school/student/create', 'App\Http\Controllers\SchoolController@createStudent')->name('student.create')->middleware('auth');
Route::get('school/student/{student}/edit', 'App\Http\Controllers\SchoolController@editStudent')->name('student.edit')->middleware('auth');
Route::post('school', 'App\Http\Controllers\SchoolController@storeStudent')->middleware('auth');
Route::put('school/student/{student}', 'App\Http\Controllers\SchoolController@updateStudent')->name('student.update')->middleware('auth');
Route::delete('school/student/{id}', 'App\Http\Controllers\SchoolController@deleteStudent')->name('student.delete')->middleware('auth');


////////////////////////////////////Lab 2///////////////////////////////////

// Route::name('contacts')->prefix('contacts')->group(function(){
//     Route::match(['post', 'get'], '', function(){
//         if(request()->isMethod('get')){
//             return '<h1>List of contacts page</h1>';
//         }elseif (request()->isMethod('post')) {
//             return '<h1>Add a contact</h1>';
//         }
//     });
//     Route::get('{id}/', function($id){
//         return '<h1>Contact with id: ' .$id. '</h1>';
//     })->where(['id'=>'[0-9]+', 'name'=>'[a-zA-Z]+']);
//     Route::name(' > create form')->get('/create', 'App\Http\Controllers\ContactsController@create');
//     Route::get('{id}/{name?}', function($id, $name='No-name'){
//         return '<h1>Contact with --> id: ' .$id. ' - name: '.$name.' </h1>';
//     });
//     Route::name(' > edit form')->get('{id}/{name?}/edit', 'App\Http\Controllers\ContactsController@editForm')->where(['id'=>'[0-9]+', 'name'=>'[a-zA-Z]+']);
//     Route::match(['put', 'delete'], '/{id}', function($id){
//         if(request()->isMethod('p')){
//             return '<h1>Edit on '.$id.' Successfully</h1>';
//         }elseif(request()->isMethod('delete')) {
//             return '<h1>Delete on '.$id.' Successfully';
//         }
//     });
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
