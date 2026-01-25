<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetLanguageController;
use App\Http\Controllers\MainController;


Route::get("/", [MainController::class, "index"])->name("main");

require __DIR__.'/auth.php';

Route::get("/lang/{lang}", SetLanguageController::class)->name("lang.switch");
