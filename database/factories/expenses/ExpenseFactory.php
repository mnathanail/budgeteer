<?php

namespace Database\Factories\expenses;

use App\Expense\Infrastructure\Eloquent\ExpenseEntity;
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
        return [
            'expense_id' => Uuid::fromString($this->faker->uuid()),
            'name' => Name::fromString($this->faker->word()),
            'type' => '',
            'cost' => Cost::fromString((string)$this->faker->randomFloat(3)),
            'date' => (new DateTimeImmutable())->format('d-m-Y'),
        ];
    }
}
