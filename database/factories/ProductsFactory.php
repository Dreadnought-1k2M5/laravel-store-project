<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' =>  $this->faker->word(),
            'product_description' => $this->faker->sentences(2, true),
            'price' => $this->faker->numberBetween(35, 19999),
            'category' => $this->faker->randomElement(['Clothing and Apparel', 'Electronics', 'Home and Garden', 'Sports and Outdoors', 'Beauty and Personal Care', 'Toys and Games', 'Books and Media'])
        ];
    }
}
