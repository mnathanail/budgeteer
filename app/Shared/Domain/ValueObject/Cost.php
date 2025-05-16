<?php

namespace App\Shared\Domain\ValueObject;

use Assert\Assertion;

final readonly class Cost
{
    public function __construct(
        private string $cost,
    ) {
        Assertion::greaterThan($this->cost, 'Cost must be positive');
    }

    public static function fromString(string $cost): self
    {
        Assertion::string($cost);
        Assertion::regex($cost, '/^\d+(\.\d{1,3})?$/', 'Invalid cost format');

        return new self($cost);
    }

    public function toString(): string
    {
        return $this->cost;
    }
}
