<?php

use App\Livewire\Counter;
use App\Livewire\Form;
use App\Livewire\Todo;
use App\Livewire\TodoList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/counter', Counter::class);
Route::get('/form', Form::class);
Route::get('/todo', TodoList::class);


