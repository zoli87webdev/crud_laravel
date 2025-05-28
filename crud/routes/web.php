<?php

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
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


// Post route example

Route::get('/formsubmitted', function (): View {
    return view('home');
});

Route::post('/formsubmitted', function (Request $request) {

    $request->validate([
        'fullname' => 'required|min:4|max:20',
        'email' => 'required|email'
    ]);

    $fullname = $request->input('fullname');
    $email = $request->input('email');

    return "Your full name is $fullname, and your email is $email";

})->name('formsubmitted');

