<?php

use Illuminate\Support\Facades\Route;
use Trippodi\Trippodi\TallStackUi\Http\Controllers\TallStackUiAssetsController;
use Trippodi\Trippodi\TallStackUi\Http\Controllers\TallStackUiCommandPaletteController;

Route::name('tallstackui-trippodi.')
    ->prefix('/tallstackui-trippodi')
    ->group(function () {
        Route::get('/script/{file?}', [TallStackUiAssetsController::class, 'script'])->name('script');
        Route::get('/style/{file?}', [TallStackUiAssetsController::class, 'style'])->name('style');
        Route::post('/command-palette/action', TallStackUiCommandPaletteController::class)->name('command-palette.action')->middleware('web');
    });
