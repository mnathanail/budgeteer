<?php

namespace App\Expense\Domain\Entity;

use App\Expense\Domain\Enum\ExpenseType;
use App\Shared\Domain\ValueObject\Cost;
use App\Shared\Domain\ValueObject\Name;
use Assert\Assertion;

class Expense
{
    private Name $name;
    private ExpenseType $type;
    private Cost $cost;
    private \DateTimeImmutable $date;

    public function __construct(
        Name               $name,
        ExpenseType        $type,
        Cost               $cost,
        \DateTimeImmutable $date
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->cost = $cost;
        $this->date = $date;
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
            'name' => $this->getName()->toString(),
            'type' => $this->getType()->value,
            'cost' => $this->getCost()->toString(),
            'date' => $this->getDate()->format('d-m-Y'),
        ];
    }

    public static function fromDatabase(array $row): Expense
    {
        Assertion::keyExists($row, 'name');
        Assertion::notEmpty($row['name']);
        Assertion::keyExists($row, 'type');
        Assertion::notEmpty($row['type']);
        Assertion::keyExists($row, 'price');
        Assertion::notEmpty($row['price']);
        Assertion::keyExists($row, 'date');
        Assertion::notEmpty($row['date']);

        return new self(
            Name::fromString($row['name']),
            ExpenseType::from($row['type']),
            Cost::fromString($row['price']),
            new \DateTimeImmutable($row['date'])
        );
    }
}
