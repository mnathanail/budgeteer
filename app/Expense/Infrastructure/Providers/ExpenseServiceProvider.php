<?php

namespace App\Expense\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class ExpenseServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(
            'App\Expense\Domain\Interface\ExpenseRepositoryInterface',
            'App\Expense\Infrastructure\Eloquent\ExpenseRepository'
        );
    }
}
