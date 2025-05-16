<?php

namespace App\Expense\Domain\Interface;

use App\Expense\Domain\Entity\Expense;

interface ExpenseRepositoryInterface
{
    public function save(Expense $expense): void;
}
