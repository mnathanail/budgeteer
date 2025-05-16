<?php

namespace App\Expense\Infrastructure\Repository;

use App\Expense\Domain\Entity\Expense;
use App\Expense\Domain\Interface\ExpenseRepositoryInterface;
use App\Expense\Infrastructure\Eloquent\ExpenseEntity;
use Illuminate\Database\Eloquent\Builder;

class ExpenseRepository implements ExpenseRepositoryInterface
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = ExpenseEntity::query();
    }

    public function save(Expense $expense): void
    {
        $this->builder->create($expense->toDatabase());
    }
}
