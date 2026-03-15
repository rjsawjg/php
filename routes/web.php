<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// Route::get('/', function () {
//     return view('layout');
// });

// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/', [MainController::class, 'index']);

Route::get('/contacts', function () {
    $contact_data = ['group' => '241-132',
                    'name' => 'Lipatov Rostislav',
                    'phone' => '89179434700'];
                    
    return view('contact', ['mycontacts' => $contact_data]);
});

Route::get('/galery', function () {
    return view('galery/galery');
});

Route::get('/galery/{id}', function ($id) {
    return view('galery/galery_item', ['id' => $id]);
});