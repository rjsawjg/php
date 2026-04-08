<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('layout');
// });
//Comment
Route::delete('/article/{id}/comment/delete', [CommentController::class, 'destroy']);
Route::post('/article/{id}/comment/create', [CommentController::class, 'create']);
Route::put('/article/{id}/comment/edit', [CommentController::class, 'update']);

//Article
Route::resource('/article', ArticleController::class);

//Auth
Route::post('/register', [Authcontroller::class, 'register']);
Route::get('/signout', [AuthController::class, 'signout']);

//Main
Route::get('/about', function () {
    return view('about');
});

Route::get('/', [MainController::class, 'index']);

Route::get('/contacts', function () {
    $contact_data = ['group' => '241-132',
                    'name' => 'Lipatov Rostislav',
                    'phone' => '89179434700'];
                    
    return view('contact', ['mycontacts' => $contact_data]);
});

// Route::get('/galery/{id}', function ($id) {
//     return view('galery/galery_item', ['id' => $id]);
// });

Route::get('/galery/{id}', [MainController::class, 'get_image']);