<?php

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

Auth::routes();

Route::get('/redirect', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/logout', 'HomeController@logout')->name('logout');

Route::group(['middleware'=>'auth', 'namespace' => 'User'], function() {

    Route::get('/stage1/registration', 'RegistrationController@index')->name('register.stage.one');
    Route::post('/stage1/registration', 'RegistrationController@store')->name('register.stage.one');
    Route::get('/license/registration', 'LicenseRegistration@index')->name('register.stage.two');
    Route::post('/license/registration', 'LicenseRegistration@store')->name('register.stage.two');
    Route::get('/profile', 'ProfileController@index')->name('profile');

});

Route::group(['namespace'=>'Admin', 'prefix'=>'admin',], function() {

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('/login', 'Auth\LoginController@login');

    Route::get('/logout',  'Auth\LoginController@logout');

    Route::group(['middleware'=> 'auth:admin',], function() {

        Route::get('/users', 'UsersController@index')->name('users.index');

    Route::get('/applications/reviewer', 'ApplicationsController@index')->name('applications.index');

    Route::put('/application/reviewer/{id}', 'ApplicationsController@reviewApp');

    Route::get('/applications/processor', 'ApplicationsController@viewAppProcessor')->name('applications.processor.index');

    Route::put('/application/processor/{id}', 'ApplicationsController@reviewAppProcessor');

    Route::delete('/users/delete/{id}', 'UsersController@delete')->name('users.destroy');

    Route::get('/home', 'HomeController@index')->name('admin.home');

    Route::resource('/admins', 'AdminUsersController');

    Route::resource('/role', 'RoleController');

    Route::resource('/permission', 'PermissionController');

    Route::get('/logout', function (){

        auth('admin')->logout();

        return redirect()->route('welcome');

    })->name('admin.logout');

    });
});
