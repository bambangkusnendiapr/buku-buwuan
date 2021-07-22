<?php

use Illuminate\Support\Facades\Route;

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
// Route::view('/', 'welcome');

Auth::routes();

// Route::get('home', 'HomeController@index')->name('home');
Route::get('/', function() {
    return redirect()->route('login');
});

Route::get('/home', function() {
    return redirect()->route('dashboard');
});

Route::get('/register', function() {
    return redirect()->route('dashboard');
});

Route::get('/password/email', function() {
    return redirect()->route('dashboard');
});

Route::get('/password/reset', function() {
    return redirect()->route('dashboard');
});

Route::namespace('Admin') //Folder Penyimpan Controller
    ->prefix('admin') //Penambahan url di awal
    ->middleware('auth') //harus login
    ->group(function () {

    //Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //Buwuan Excel
    Route::get('export/buwuan', 'DashboardController@exportBuwuan')->name('export.buwuan');

    // PDF dan Print
    Route::get('pdf/print/buwuan', 'DashboardController@pdfprint')->name('pdf.print');

    //download template
    Route::get('template/buwuan', 'DashboardController@template')->name('template.buwuan');

    //import
    Route::post('import/buwuan', 'DashboardController@importbuwuan')->name('import.buwuan');
    
    //Profile
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::patch('profile/update/{id}', 'UserController@profileUpdate')->name('profile.update');
    Route::patch('profile/password/{id}', 'UserController@profilePassword')->name('profile.password');

    //buwuan
    Route::view('buwuan', 'admin.buwuan.index')->name('buwuan');
    
    //profil kantor
    Route::resource('profil', 'Master\ProfilController');

    //master kategori
    Route::resource('kategori', 'Master\KategoriController');

    // master blok
    Route::resource('blok', 'Master\BlokController');

    
    //Pengaturan
    //User / Pengguna
    Route::resource('user', 'UserController');
    Route::resource('menu', 'MenuController');    
    Route::resource('permission', 'PermissionController');    
    Route::resource('role', 'RoleController');
    
});