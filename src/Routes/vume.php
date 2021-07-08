<?php

use Vume\Laravel\Controllers\VumeController;

Route::get('/clear-cache', [VumeController::class, 'clearCache']);