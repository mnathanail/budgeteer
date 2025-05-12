<?php

namespace Tests\Feature\expenses;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExpensesTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_index(): void
    {
        $response = $this->get('/expenses');

        $response->assertStatus(200);
    }
}
