<?php

use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    'role:Super Admin'
])->group(function () {

    Route::put('partners/change-status', [PartnerController::class, 'updateStatus']);
    
    Route::resource('partners', PartnerController::class)->except(['create', 'edit']);
});
