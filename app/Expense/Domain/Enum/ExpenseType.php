<?php

namespace App\Expense\Domain\Enum;

enum ExpenseType: string
{
    case PERSONAL = 'personal';
    case FAMILY = 'family';

    public static function personal(): self
    {
        return self::PERSONAL;
    }

    public static function family(): self
    {
        return self::FAMILY;
    }

    public function isPersonal(): bool
    {
        return $this === self::PERSONAL;
    }

    public function isFamily(): bool
    {
        return $this === self::FAMILY;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
