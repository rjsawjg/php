<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contacts', function () {
    $contact_data = ['group' => '241-132',
                    'name' => 'Lipatov Rostislav',
                    'phone' => '89179434700'];
                    
    return view('contact', ['mycontacts' => $contact_data]);
});
