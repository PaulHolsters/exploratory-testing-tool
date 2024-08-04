<?php

use App\Models\Test;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tests',[
        'tests' => Test::all()
    ]);
});

Route::get('/test/{id}', function ($id){
    return view('test',[
        'job' => Test::find($id)
    ]);
});

// todo voeg deleten van tests toe

Route::get('/bugreport', function () {
    return view('bugreport');
});


