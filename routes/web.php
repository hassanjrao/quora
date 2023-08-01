<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReplyController;
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

// Example Routes
Route::get("/",[HomeController::class, "index"])->name("home");


Route::resource("questions", QuestionController::class)->except(["index"]);
Route::resource('anserts', AnswerController::class)->except(["index"]);
Route::resource("replies", ReplyController::class)->except(["index"]);
