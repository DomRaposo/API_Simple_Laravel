<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/status', [ApiController::class,  'status']);
Route::get('/clients', [ApiController::class,  'clients']);
Route::post('/client', [ApiController::class,  'client']);
Route::post('/add-client', [ApiController::class, 'addclient']);
Route::put('/update-client', [ApiController::class, 'updateclient']);
Route::delete('/delete-client/{id}', [ApiController::class, 'deleteclient']);