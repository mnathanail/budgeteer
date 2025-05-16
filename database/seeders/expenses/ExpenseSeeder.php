<?php

namespace Database\Seeders\expenses;

use App\Expense\Infrastructure\Eloquent\ExpenseEntity;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExpenseEntity::factory()->count(10)->create();
    }
}
