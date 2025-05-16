<?php

namespace App\Expense\Infrastructure\Eloquent;

use Database\Factories\expenses\ExpenseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * ExpenseEntity
 * @mixin Builder
 */
class ExpenseEntity extends Model
{
    /** @use HasFactory<ExpenseFactory> */
    use HasFactory;

    protected $table = 'expenses';
    protected $fillable = [
        'expense_id',
        'name',
        'type',
        'cost',
        'date',
    ];
}
