<?php

use Illuminate\Support\Facades\Route;
use Vertex\SupportWidget\Http\Controllers\WidgetController;


Route::middleware('web')
    ->post(
        '/vertex-support/sso',
        WidgetController::class
    )
    ->name('vertex-support.sso');