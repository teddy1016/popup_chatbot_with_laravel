<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PopupChatController;
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

Route::get('/', [PopupChatController::class, 'index'])->name('home');
Route::post('/', [PopupChatController::class, 'send'])->name('home.send');

Route::get('/chat', [App\Http\Controllers\ChatGPTController::class, 'askToChatGpt']);