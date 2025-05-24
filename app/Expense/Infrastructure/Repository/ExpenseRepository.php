<?php

namespace App\Expense\Infrastructure\Repository;

use App\Expense\Domain\Entity\Expense;
use App\Expense\Domain\Interface\ExpenseRepositoryInterface;
use App\Expense\Infrastructure\Eloquent\ExpenseEntity;
use App\Shared\Application\Uuid\UuidRepositoryInterface;
use App\Shared\Domain\ExpenseId;
use Illuminate\Database\Eloquent\Builder;

class ExpenseRepository implements ExpenseRepositoryInterface
{
    public function __construct(
        private readonly UuidRepositoryInterface $uuidRepository,
        private Builder $builder
    ) {
        $this->builder = ExpenseEntity::query();
    }

    public function save(Expense $expense): void
    {
        $this->builder->create($expense->toDatabase());
    }

    public function getNextId(): ExpenseId
    {
        return ExpenseId::fromString(
            $this->uuidRepository->getUuid()->toString()
        );
    }
}
