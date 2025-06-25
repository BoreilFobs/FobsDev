<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Educam', function () {
    return view('portfolio.educam');
});
Route::get('/FobsSMS', function () {
    return view('portfolio.sms');
});
