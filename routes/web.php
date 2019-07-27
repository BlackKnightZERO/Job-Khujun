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
Route::get('/', 'CustomAuthController@showIndex');

Route::get('/custom-register', 'CustomAuthController@showRegisterForm');
Route::post('/custom-register', 'CustomAuthController@register')->name('custom.register');

Route::get('/custom-login', 'CustomAuthController@showLoginForm');
Route::post('/custom-login', 'CustomAuthController@login')->name('custom.login');

Route::get('/company_admin_dashboard', 'CustomAuthController@showCompanyAdminDashboard');

Route::get('/logout','CustomAuthController@logout');

Route::post('/company_admin_dashboard', 'CustomAuthController@CompanyAdminPostJob')->name('company.dashboard.jobform');

Route::get('/user-profile', 'CustomAuthController@user_profile');

Route::post('/user-profile/imgUp','CustomAuthController@userUploadsPic')->name('user.picUpload');

Route::post('/user-profile/cvUp','CustomAuthController@userUploadsCV')->name('user.cvUpload');

Route::get('/applySingleJob/{id}','CustomAuthController@applySingleJob');