<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

// Get Route example
Route::get('/', function (): View
{
    return view('welcome');
});

// Parameters using route
Route::get('/portfolio/{firstname}/{lastname}', function($firstname, $lastname)
{
    return $firstname . " " . $lastname;
});

// Names routes

Route::get('/test', function () {
    return "This is a test";
})->name('testpage');


// Group routes

Route::prefix('portfolio')->group(function () {
    Route::get('/company', function(){
        return view('company');
    });
    Route::get('/organization', function(){
        return view('organization');
    });
});
