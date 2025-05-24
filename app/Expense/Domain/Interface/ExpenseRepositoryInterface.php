<?php

namespace App\Expense\Domain\Interface;

use App\Expense\Domain\Entity\Expense;
use App\Shared\Domain\ExpenseId;

interface ExpenseRepositoryInterface
{
    public function save(Expense $expense): void;

    public function getNextId(): ExpenseId;
}
