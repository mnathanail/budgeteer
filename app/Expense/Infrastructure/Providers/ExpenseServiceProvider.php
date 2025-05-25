<?php

namespace App\Expense\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class ExpenseServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(
            'App\Expense\Domain\Interface\ExpenseRepositoryInterface::class',
            'App\Expense\Infrastructure\Repository\ExpenseRepository::class'
        );

    }
}
