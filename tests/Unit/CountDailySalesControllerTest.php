<?php

namespace Tests\Unit;

use Tests\TestCase;

class CountDailySalesControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testCountDailySales(): void
    {
        $request = [
            "start_date" => "2023-01-01",
            "end_date" => "2023-06-30",
            "payee_id" => "",
            "payment_status" =>  "",
        ];

        $response = $this->post('/api/daily-sale', $request);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Sale successfully counted']);

        $this->assertNotNull($response->json('total_sale'));
    }
}
