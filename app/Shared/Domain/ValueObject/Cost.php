<?php

namespace App\Shared\Domain\ValueObject;

use Assert\Assertion;

final readonly class Cost
{
    public function __construct(
        private string $cost,
    ) {
        Assertion::greaterThan((float)$cost, 0, 'Cost cannot be negative');
    }

    public static function fromString(string $cost): self
    {
        Assertion::string($cost);
        Assertion::regex($cost, '/^(?:[1-9]\d*|0)(?:\.\d{1,3})?$/', 'Invalid cost format');

        return new self($cost);
    }

    public function toString(): string
    {
        return $this->cost;
    }
}
