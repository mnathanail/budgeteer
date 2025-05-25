<?php

namespace App\Expense\Infrastructure\Repository;

use App\Expense\Domain\Entity\Expense;
use App\Expense\Domain\Interface\ExpenseRepositoryInterface;
use App\Expense\Infrastructure\Eloquent\ExpenseEntity;
use App\Shared\Application\Uuid\UuidRepositoryInterface;
use App\Shared\Domain\ExpenseId;
use Illuminate\Database\Eloquent\Builder;

readonly class ExpenseRepository implements ExpenseRepositoryInterface
{
    private Builder $builder;
    public function __construct(
        private UuidRepositoryInterface $uuidRepository,
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
