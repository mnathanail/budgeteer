<?php

namespace App\Shared\Domain\ValueObject;

use Assert\Assertion;

final readonly class Name
{
    public function __construct(
        private string $name,
    )
    {
    }

    public static function fromString(string $name): self
    {
        Assertion::string($name);
        Assertion::notEmpty($name, 'Name cannot be empty');

        return new self($name);
    }

    public function toString(): string
    {
        return $this->name;
    }
}
