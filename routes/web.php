<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes(['register' => false, 'verify' => true]);

Route::group(['middleware' => ['public']], function () {

	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::post('/changePersonalInformation', 'ProfileController@changePersonalInformation')->name('changePersonalInformation');
	Route::post('/changePassword', 'ProfileController@changePassword')->name('changePassword');

});

Route::group(['middleware' => ['permission']], function () {

	Route::resource('role', 'RoleController', ['except' => ['show']]);
	Route::resource('user', 'UserController', ['except' => ['show']]);
    // Route::resource('estadisticas', 'RoleController', ['except' => ['show']]);
    Route::resource('activitylog', 'ActivityLogController', ['only' => ['index']]);

    Route::get('questionnaire/pdf/{questionnaire?}', 'QuestionnaireController@exportPdf')->name('questionnaire.pdf');
    Route::get('questionnaire/excel', 'QuestionnaireController@exportExcel')->name('questionnaire.excel');
    Route::resource('questionnaire', 'SafeQuarantineController', ['only' => ['index', 'show']]);

    //Safe Quarantine
    Route::get('safe-quarantine-control/pdf/{safe_control?}', 'SafeQuarantineController@exportPdf')->name('safe-quarantine-control.pdf');
    Route::resource('safe-quarantine-control', 'SafeQuarantineController', ['only' => ['index', 'show']]);
    
});

Route::get('/liability/signature/{filename?}', function ($filename = null){
    if ($filename === null) {
        abort(404);
    }

    $path = storage_path('app/questionnaire/signature/'.$filename);
    if (!File::exists($path)){
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('file.cliente');
