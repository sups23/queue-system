<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('patient', 'PatientCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('dept', 'DeptCrudController');
    Route::crud('appointment', 'AppCrudController');
    Route::crud('report', 'ReportCrudController');
    Route::crud('doctor-time', 'DoctorTimeCrudController');
    Route::crud('doctor', 'DoctorCrudController');
    Route::crud('nurse', 'NurseCrudController');
    Route::crud('queue', 'QueueCrudController');
    Route::crud('user', 'UserCrudController');

    Route::get('/slot-full', 'AppCrudController@slotFull');
}); // this should be the absolute last line of this file