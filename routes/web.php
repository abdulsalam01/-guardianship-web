<?php

use Illuminate\Support\Facades\Route;

//Namespace Auth
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PerwalianController as AdminPerwalianController;
use App\Http\Controllers\Dosen\DosenController;
use App\Http\Controllers\Dosen\ProfileController as DosenProfileController;
use App\Http\Controllers\Dosen\PerwalianController as DosenWaliController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\Mahasiswa\PerwalianController;
use App\Http\Controllers\Mahasiswa\ProfileController;

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

Route::view('/','welcome');


Route::group(['namespace' => 'Admin','middleware' => 'auth','prefix' => 'admin'],function(){

	Route::get('/',[AdminController::class,'index'])->name('admin')->middleware(['can:admin']);

	//Route Rescource
	Route::resource('/user','UserController')->middleware(['can:admin']);
	Route::resource('/teacher','TeacherController')->middleware(['can:admin']);
    Route::resource('/jurusan','JurusanController')->middleware(['can:admin']);
    Route::resource('/perwalian','PerwalianController')->middleware(['can:admin']);

	// spesific import-files
	Route::post('/user/import','UserController@import')->middleware(['can:admin']);
	Route::post('/teacher/import','TeacherController@import')->middleware(['can:admin']);
});

Route::group(['namespace' => 'Mahasiswa','middleware' => 'auth' ,'prefix' => 'mahasiswa'],function(){
	Route::get('/',[MahasiswaController::class,'index'])->name('mahasiswa');

    //perwalian
    Route::get('/perwalian',[PerwalianController::class,'index'])->name('perwalian-mahasiswa');	
	Route::post('/perwalian-create',[PerwalianController::class,'store']);
	
    Route::get('/perwalian/list',[PerwalianController::class,'list'])->name('perwalian-mahasiswa.list');

    //profile
    Route::get('/akun',[ProfileController::class,'index'])->name('akun-mahasiswa');
	Route::patch('/akun/update/{user}',[ProfileController::class,'update'])->name('akun-mahasiswa.update');

});

Route::group(['namespace' => 'Dosen','middleware' => 'auth' ,'prefix' => 'dosen'],function(){
	Route::get('/',[DosenController::class,'index'])->name('dosen');

    //perwalian
    Route::resource('/perwalian-dosen', '\App\Http\Controllers\Dosen\PerwalianController');
	Route::patch('/perwalian-approval/{id}', [\App\Http\Controllers\Dosen\PerwalianController::class, 'update']);

    //profile
    Route::get('/akun',[DosenProfileController::class,'index'])->name('akun-dosen');
	Route::patch('/akun/update/{user}',[DosenProfileController::class,'update'])->name('akun-dosen.update');
});


Route::group(['namespace' => 'Auth','middleware' => 'guest'],function(){
	Route::view('/login','auth.login')->name('login');
	Route::post('/login',[LoginController::class,'authenticate'])->name('login.post');
});

// Other
Route::view('/register','auth.register')->name('register');
Route::view('/forgot-password','auth.forgot-password')->name('forgot-password');
Route::post('/logout',function(){
	return redirect()->to('/login')->with(Auth::logout());
})->name('logout');
