<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// todo create bugreports
$jobs = [
    [
        'id' => 1,
        'charter'=>'charter A
             flutftfktfkutfkutflutf tfktfkutfkutflutfkut
             flutftfktfkutfkutflutf tfktfkutfkutflutfkut
             flutftfktfkutfkutflutf tfktfkutfkutflutfkut tfktfkutfkutflutftfktfkutfkutflutf tfktfkutfkutflutfkutfkutflutf','date'=>'5/6/2024'],
    ['id' => 2,'charter'=>'charter B tfktfkutfkutflutftfktfkutfkutflutftfktfkutfkutflutfkutfkutflutf','date'=>'5/6/2024'],
];

Route::get('/', function () use ($jobs) {
    return view('tests',[
        'tests' => $jobs
    ]);
});

Route::get('/test/{id}', function ($id) use ($jobs) {
    return view('test',[
        'job' => Arr::first($jobs, function ($job) use ($id) {
            return $id == $job['id'];
        })
    ]);
});

Route::get('/bugreport', function () {
    return view('bugreport');
});


