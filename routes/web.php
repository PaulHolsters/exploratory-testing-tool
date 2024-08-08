<?php

use App\Http\Controllers\BugReportController;
use App\Http\Controllers\TestController;
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


