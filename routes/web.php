<?php

use App\Http\Controllers\BugReportController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect('/tests');
});

Route::resource('tests',TestController::class,[
    'except' => ['edit','store']
]);

// todo voeg deleten van tests en bugreports toe

Route::get('/bugreport', [BugReportController::class, 'index']);


