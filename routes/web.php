<?php

use App\Http\Controllers\UserFormController;
use App\Http\Livewire\FormComponent;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('/',HomeComponent::class);

Route::middleware(['auth:sanctum','verified'])->group(function() {

    Route::get('/form', FormComponent::class)->name('form');
    Route::post('/form',[UserFormController::class, 'store'])->name('form.store');

});


