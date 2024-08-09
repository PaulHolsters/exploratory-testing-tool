<?php

use App\Http\Controllers\BugReportController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestStepController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect('/tests');
});

Route::resource('tests',TestController::class,[
    'except' => ['edit','create']
]);

Route::resource('bugreports',BugReportController::class,[
    'except' => ['edit','create']
]);

Route::resource('teststeps', TestStepController::class,[
    'except' => ['edit','create']
]);

Route::patch('teststeps/{teststep}/up',[TestStepController::class,'up']);
Route::patch('teststeps/{teststep}/down',[TestStepController::class,'down']);

