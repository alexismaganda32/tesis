<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

//Route::resource('questionnaire', 'QuestionnaireController', ['only' => ['store']]);

Route::get('safe-quarantine-format', 'SafeQuarantineController@get_format');
Route::post('safe-quarantine-control','SafeQuarantineController@save_safe_control');

