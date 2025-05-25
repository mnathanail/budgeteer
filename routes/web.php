<?php

use App\Expense\Infrastructure\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::prefix('/expenses')->name('expenses.')->group(function () {
    Route::get('/', [ExpenseController::class, 'index'])->name('index');
});
