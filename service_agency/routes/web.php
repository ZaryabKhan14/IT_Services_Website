<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\user\UserDashboardController;
use App\Http\Controllers\admin\AddUserController;
use App\Http\Controllers\admin\ShowUserController;
use App\Http\Controllers\admin\AddSliderController;
use App\Http\Controllers\admin\ShowSliderCotroller;
use App\Http\Controllers\admin\AddServiceController;
use App\Http\Controllers\admin\ShowServiceController;
use App\Http\Controllers\admin\ShowContactFormController;
use App\Http\Controllers\user\ContactUsController;
use App\Http\Controllers\admin\AddContactDetailsController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/admin_dashboard', [AdminDashboardController::class, 'admin_dashboard'])->name('admin');
Route::get('/user_dashboard', [UserDashboardController::class, 'user_dashboard'])->name('user_dashboard');
Route::get('admin/add_user_form', [AddUserController::class, 'add_user_form'])->name('add_user_form');
Route::post('admin/add_user', [AddUserController::class, 'add_user'])->name('add_user');
Route::get('admin/show_user', [ShowUserController::class, 'show_user'])->name('show_user');
Route::get('admin/delete_user/{id}', [ShowUserController::class, 'delete_user'])->name('delete_user');
Route::get('admin/edit_user_form/{id}', [ShowUserController::class, 'edit_form'])->name('edit_form');
Route::post('admin/update_user/{id}', [ShowUserController::class, 'update_user'])->name('update_user');
Route::get('admin/slider_form', [AddSliderController::class, 'add_slider_form'])->name('add_slider_form');
Route::post('admin/add_slider', [AddSliderController::class, 'add_slider'])->name('add_slider');
Route::get('admin/show_slider', [ShowSliderCotroller::class, 'show_slider'])->name('show_slider');
Route::get('/admin/delete_slider/{id}', [ShowSliderCotroller::class, 'delete_slider'])->name('delete_slider');
Route::get('/admin/edit_slider_form/{id}', [ShowSliderCotroller::class, 'edit_slider_form'])->name('edit_slider_form');
Route::post('/admin/update_slider/{id}', [ShowSliderCotroller::class, 'update_slider'])->name('update_slider');
Route::get('/admin/add_service_form', [AddServiceController::class, 'service_form'])->name('service_form');
Route::post('/admin/add_service', [AddServiceController::class, 'add_service'])->name('add_service');

Route::get('/admin/show_service', [ShowServiceController::class, 'show_service'])->name('show_service');
Route::get('/admin/delete_service/{id}', [ShowServiceController::class, 'delete_service'])->name('delete_service');
Route::get('/admin/service_edit_form/{id}', [ShowServiceController::class, 'service_edit_form'])->name('service_edit_form');
Route::post('/admin/update_service/{id}', [ShowServiceController::class, 'update_service'])->name('update_service');

Route::post('/contact_us', [ContactUsController::class, 'contact_us'])->name('contact_us');
Route::get('/admin/show/contact_us', [ShowContactFormController::class, 'show_contact_form_details'])->name('show_contact_form_details');

Route::get('/admin/add_contact_form', [AddContactDetailsController::class, 'add_contact_form'])->name('add_contact_form');
Route::post('/admin/add_contact_details', [AddContactDetailsController::class, 'add_contact_details'])->name('add_contact_details');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
Route::get('/redirect', [DashboardController::class, 'redirect'])->name('redirect');

});
