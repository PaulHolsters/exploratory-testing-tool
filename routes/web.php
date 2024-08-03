<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tests',[
        'tests' => [
            ['charter'=>'charter A
             flutftfktfkutfkutflutf tfktfkutfkutflutfkut
             flutftfktfkutfkutflutf tfktfkutfkutflutfkut
             flutftfktfkutfkutflutf tfktfkutfkutflutfkut tfktfkutfkutflutftfktfkutfkutflutf tfktfkutfkutflutfkutfkutflutf','date'=>'5/6/2024'],
            ['charter'=>'charter B tfktfkutfkutflutftfktfkutfkutflutftfktfkutfkutflutfkutfkutflutf','date'=>'5/6/2024'],
            ['charter'=>'charter N tfktfkutfkutflutftfktfkutfkutflutftfktfkutfkutflutfkutfkutflutf','date'=>'5/6/2024'],
            ['charter'=>'charter N tfktfkutfkutflutftfktfkutfkutflutftfktfkutfkutflutfkutfkutflutf','date'=>'5/6/2024'],
            ['charter'=>'charter N tfktfkutfkutflutftfktfkutfkutflutftfktfkutfkutflutfkutfkutflutf','date'=>'5/6/2024'],
            ['charter'=>'charter N tfktfkutfkutflutftfktfkutfkutflutftfktfkutfkutflutfkutfkutflutf','date'=>'5/6/2024'],
            ['charter'=>'charter N tfktfkutfkutflutftfktfkutfkutflutftfktfkutfkutflutfkutfkutflutf','date'=>'5/6/2024'],
        ]
    ]);
});

Route::get('/{id}/test', function () {
    return view('test');
});

Route::get('/bugreport', function () {
    return view('bugreport');
});


