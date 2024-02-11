<?php

namespace Tests\Unit;

use Tests\TestCase;

class FactoryStoreSalesTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testStoreSalesUsingFaker(): void
    {
        $response = $this->get('/api/store-sale');

        $response->assertStatus(200)
            ->assertJson(['message' => 'Sale created successfully']);

        $this->assertNotNull($response->json('sale'));
    }
}
