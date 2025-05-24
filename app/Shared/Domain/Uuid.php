<?php

namespace App\Shared\Domain;

use Assert\Assertion;

class Uuid
{

    public function __construct(
        private string $uuid,
    ) {}

    public static function fromString(string $uuid): self
    {
        Assertion::uuid($uuid);
        return new self($uuid);
    }

    public function toString(): string
    {
        return $this->uuid;
    }
}
