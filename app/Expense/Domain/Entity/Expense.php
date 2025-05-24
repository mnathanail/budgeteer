<?php

namespace App\Expense\Domain\Entity;

use App\Expense\Domain\Enum\ExpenseType;
use App\Shared\Domain\ExpenseId;
use App\Shared\Domain\ValueObject\Cost;
use App\Shared\Domain\ValueObject\Name;
use Assert\Assertion;

class Expense
{

    private const DATE_FORMAT = 'd-m-Y';
    public function __construct(
        private ExpenseId $expenseId,
        private Name $name,
        private ExpenseType $type,
        private Cost $cost,
        private \DateTimeImmutable $date
    )
    {
    }

    public function getExpenseId(): ExpenseId
    {
        return $this->expenseId;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getType(): ExpenseType
    {
        return $this->type;
    }

    public function getCost(): Cost
    {
        return $this->cost;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function toDatabase(): array
    {
        return [
            'expense_id' => $this->getExpenseId()->toString(),
            'name' => $this->getName()->toString(),
            'type' => $this->getType()->value,
            'cost' => $this->getCost()->toString(),
            'date' => $this->getDate()->format(self::DATE_FORMAT),
        ];
    }

    public static function fromDatabase(array $row): Expense
    {
        Assertion::keyExists($row, 'expense_id');
        Assertion::uuid($row['expense_id']);
        Assertion::keyExists($row, 'name');
        Assertion::notEmpty($row['name']);
        Assertion::keyExists($row, 'type');
        Assertion::notEmpty($row['type']);
        Assertion::keyExists($row, 'cost');
        Assertion::notEmpty($row['cost']);
        Assertion::keyExists($row, 'date');
        Assertion::notEmpty($row['date']);

        $date = \DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $row['date']);
        Assertion::isInstanceOf($date, \DateTimeImmutable::class);

        return new self(
            ExpenseId::fromString($row['expense_id']),
            Name::fromString($row['name']),
            ExpenseType::from($row['type']),
            Cost::fromString($row['cost']),
            $date
        );
    }
}
