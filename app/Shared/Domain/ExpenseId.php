<?php

namespace App\Shared\Domain;

class ExpenseId
{
    public function __construct(
        private Uuid $uuid,
    ) {}

    public static function fromString(string $uuid): self
    {
        return new self(Uuid::fromString($uuid));
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }
}
