<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $productsArray1 = [
            ["Beauty and Personal Care", "Aurora Glow Body Oil"],
            ["Beauty and Personal Care", "Starlight Shimmer Highlighter"],
            ["Beauty and Personal Care", "Moonstone Magic Facial Mist"],
            ["Beauty and Personal Care", "Enchanted Forest Hair Mask"],
            ["Beauty and Personal Care", "Mermaid's Lagoon Bath Salts"],
            ["Beauty and Personal Care", "Unicorn Tears Eyeshadow Palette"],
        ];
        $clothingApparel = [
            ["Clothing and Apparel", "Mystique Hoodie"],
            ["Clothing and Apparel", "Aurora Bomber Jacket"],
            ["Clothing and Apparel", "Infinity Scarf"],
            ["Clothing and Apparel", "Nova Leggings"],
            ["Clothing and Apparel", "Celestial Dress"],
            ["Clothing and Apparel", "Eclipse Sunglasses"],
            ["Clothing and Apparel", "Galactic Sneakers"],
            ["Clothing and Apparel", "Solar Backpack"],
            ["Clothing and Apparel", "Lunar Watch"]
        ];
        
        // \App\Models\User::factory(10)->create();
        $categoryIndex = 0;
        $productNameIndex = 1;

        for($i=0; $i < count($productsArray1); $i++) {
            //Will stil generate product_Description and price from product factory file
            \App\Models\Products::factory()->create([
                'product_name' => $productsArray1[$i][$productNameIndex],
                'category' => $productsArray1[$i][$categoryIndex],
            ]);
        }
        for($i=0; $i < count($clothingApparel); $i++) {
            //Will stil generate product_Description and price from product factory file
            \App\Models\Products::factory()->create([
                'product_name' => $clothingApparel[$i][$productNameIndex],
                'category' => $clothingApparel[$i][$categoryIndex],
            ]);
        }
        
         $user = \App\Models\User::factory()->create([
             'first_name' => 'firstNameTest',
             'last_name' => 'lastNameTest',
             'email' => 'test@example.com',
         ]);

         $product_id = \App\Models\Products::factory()->create([
            'product_name' => "test product name",
            'category' => "test category",
        ]);

         
         \App\Models\Carts::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product_id->id
         ]);
    }
}
