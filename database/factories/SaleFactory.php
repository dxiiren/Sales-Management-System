<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => 1,
            'ref_num' => $this->faker->unique()->regexify('[A-Za-z0-9]{10}'),
            'invoice_date' => $this->faker->date(),
            'payee' => $this->faker->name(),
            'payee_id' => $this->faker->numberBetween(2, 301),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'currency_total' => $this->faker->randomFloat(2, 10, 1000),
            'paid' => $this->faker->randomFloat(2, 0, 1000),
            'due' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
