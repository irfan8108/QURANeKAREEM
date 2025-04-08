<?php

use App\Http\Controllers\Api\SurahController;
use App\Http\Controllers\Api\AyahController;
use Illuminate\Support\Facades\Route;

Route::apiResource('surahs', SurahController::class);
Route::apiResource('ayahs', AyahController::class)->only(['index', 'show']);

Route::get('search/surahs', [SurahController::class, 'search']);
Route::get('search/ayahs', [AyahController::class, 'search']);
