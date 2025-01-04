<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/simple-form', function () {
    return view('simple-form');
});

Route::get('/contact-form', function () {
    return view('contact-form');
});

Route::post('/contact-form', function (Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'nullable|string',
    ]);
    return back()->with('success', 'Your message has been sent!');
});

Route::get('/complete-form', function () {
    return view('complete-form');
});

Route::post('/complete-form', function (Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'nullable|string',
    ]);
});

Route::get('/contact-display', function () {
    return view('contact-display');
});