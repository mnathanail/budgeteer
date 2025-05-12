<?php

use App\Http\Controllers\expenses\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::prefix('/expenses')->name('expenses.')->group(function () {
    Route::get('/', [ExpenseController::class, 'index'])->name('index');
});
