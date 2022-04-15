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

Route::view('/', 'auth.login');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/payments/pay', [App\Http\Controllers\PaymentController::class, 'create'])->name('payment.create');
    Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'initialize'])->name('pay');
    Route::get('/rave/callback', [\App\Http\Controllers\PaymentController::class, 'callback'])->name('callback');
    Route::get('/payments/failed', [App\Http\Controllers\CheckoutController::class, 'wrong'])->name('failed');
    Route::get('/payments/cancelled', [App\Http\Controllers\CheckoutController::class, 'cancel'])->name('payments.cancelled');
    Route::get('/payments/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('payments.success');

    Route::get('/profile','StepTwoController@create')->name('profile');
    Route::post('/profile','StepTwoController@store')->name('profile.store');
});
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionController');

    // Roles
    Route::delete('roles/destroy', 'RoleController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RoleController');

    // Users
    Route::delete('users/destroy', 'UserController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UserController');

    // Appointment
    Route::delete('appointments/destroy', 'AppointmentController@massDestroy')->name('appointments.massDestroy');
    Route::resource('appointments', 'AppointmentController');

    // Consultation
    Route::delete('consultations/destroy', 'ConsultationController@massDestroy')->name('consultations.massDestroy');
    Route::resource('consultations', 'ConsultationController');

    // Prescription
    Route::delete('prescriptions/destroy', 'PrescriptionController@massDestroy')->name('prescriptions.massDestroy');
    Route::resource('prescriptions', 'PrescriptionController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});

Route::group(['prefix' => 'patient', 'as' => 'patient.', 'namespace' => 'Patient', 'middleware' => ['auth', 'payment','step-two']], function () {

    Route::get('/', 'HomeController@index')->name('home.index');
    // Appointment
    Route::resource('appointments', 'AppointmentController')->except(['create','update','edit','store']);
    // Prescription
    Route::resource('prescriptions', 'PrescriptionController')->except(['create','update','edit','store']);

    // Payment
    Route::resource('payments', 'PaymentController')->except(['create','update','edit','store','show']);


    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');

});


Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
