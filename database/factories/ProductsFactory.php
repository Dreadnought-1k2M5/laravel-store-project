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
/*         $productsArray = [
            ["Beauty and Personal Care", "Aurora Glow Body Oil"],
            ["Beauty and Personal Care", "Starlight Shimmer Highlighter"],
            ["Beauty and Personal Care", "Moonstone Magic Facial Mist"],
            ["Beauty and Personal Care", "Enchanted Forest Hair Mask"],
            ["Beauty and Personal Care", "Mermaid's Lagoon Bath Salts"],
            ["Beauty and Personal Care", "Unicorn Tears Eyeshadow Palette"],
            $index = rand(0, count($productsArray) - 1);
        ]; */

        return [
            'product_name' => $this->faker->word(),
            'product_description' => $this->faker->sentences(5, true),
            'price' => $this->faker->numberBetween(45, 599),
            'category' => $this->faker->randomElement(['Clothing and Apparel', 'Electronics', 'Home and Garden', 'Sports and Outdoors', 'Beauty and Personal Care', 'Toys and Games', 'Books and Media'])
        ];
    }
}
