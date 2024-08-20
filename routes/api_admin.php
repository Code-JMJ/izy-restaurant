<?php

use App\Http\Controllers\PartnerBranchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
])->group(function () {

    Route::put('partner_branches/change_status', [PartnerBranchController::class, 'updateStatus']);
    Route::put('users/change_status', [UserController::class, 'updateStatus']);

    Route::resource('partner_branches', PartnerBranchController::class)->except(['create', 'edit']);
    Route::resource('users', UserController::class)->except(['create', 'edit']);

});
