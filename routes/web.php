<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Airplane;

Route::get("/", function()
{

    return view("welcome");

});

Route::get("/dashboard", function()
{

    return view("dashboard");

})->name("dashboard");

Route::get("/airplane", Airplane::class)->name("airplane");