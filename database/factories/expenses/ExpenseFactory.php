<?php

namespace Database\Factories\expenses;

use App\Expense\Domain\Entity\Expense;
use App\Expense\Domain\Enum\ExpenseType;
use App\Expense\Infrastructure\Eloquent\ExpenseEntity;
use App\Shared\Domain\ExpenseId;
use App\Shared\Domain\Uuid;
use App\Shared\Domain\ValueObject\Cost;
use App\Shared\Domain\ValueObject\Name;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ExpenseEntity>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $expense = new Expense(
            expenseId: ExpenseId::fromString($this->faker->uuid()),
            name: Name::fromString($this->faker->word()),
            type: $this->faker->randomElement(ExpenseType::cases()),
            cost: Cost::fromString((string)$this->faker->randomFloat(3, 0.001, 1000)),
            date: new DateTimeImmutable()
        );

        return $expense->toDatabase();
    }
}
