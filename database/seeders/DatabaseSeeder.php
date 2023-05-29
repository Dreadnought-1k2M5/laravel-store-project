<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{

        $clothingApparel = [
            ["Clothing and Apparel", "Mystique Hoodie", 54, 23, "productFolder/z0A9UkH71czm3KkwLmi83kHGSBcUeafhZKYz6DbF.webp", "Make a bold fashion statement with our Mystique Hoodie. Designed for those who embrace a sense of mystery and intrigue, this hoodie combines contemporary style with ultimate comfort. Step into the spotlight and captivate everyone around you with its unique allure."],
            ["Clothing and Apparel", "Aurora Bomber Jacket", 52, 34, "productFolder/5eB2XP1f7H23ex7i3m52Wi8WJwcnQzwCJApmbMQp.jpg", "Elevate your outerwear game with our Aurora Bomber Jacket. Combining timeless elegance with a touch of urban edge, this jacket is designed to make a bold statement wherever you go. Step into the spotlight and let the Aurora Bomber Jacket illuminate your style."],
            ["Clothing and Apparel", "Galactic Sneakers", 120, 32, "productFolder/KHqaECpfpCW7GtNfXa5BnVrLsQnEF405NfO7ARxo.jpg", "Step into a world of unparalleled style and cosmic charm with our Galactic Sneakers. Designed to ignite your imagination and elevate your footwear game, these sneakers are a fusion of futuristic design and unmatched comfort. Get ready to explore new fashion frontiers and leave a trail of stardust wherever you go."],
            ["Clothing and Apparel", "Solar Backpack", 55, 23, "productFolder/Ohb6wpGsGoQOaQCthC0oLKeSbvVJTZeUGllRsgci.webp", "Experience the ultimate blend of convenience, sustainability, and style with our Solar Backpack. Designed for the modern explorer, this backpack harnesses the power of the sun to keep your devices charged while you're on the move. Embrace eco-friendly technology and embark on your adventures with a fully charged backpack."],
            ["Clothing and Apparel", "AeroFlex Shoes", 80, 34, "productFolder/u2wo1uXmepozcV09nPpeA33o3wQPl2LBEiuv96Gb.webp", "The AeroFlex Shoes are a perfect blend of style and comfort. These futuristic sneakers feature a lightweight, breathable design with advanced cushioning technology, ensuring a comfortable fit all day long. Whether you're hitting the gym or exploring the city, the AeroFlex Shoes will keep you looking and feeling great."],
        ];
        $electronicsApparel = [
            ["Electronics", "Aurora VoxiPod", 200, 44, "productFolder/v7djUBB0rcbqt24xgcEfaQVliSs07TOMB9XVG7Lx.jpg", "The VoxiPod is a cutting-edge wearable device that combines the functionality of a smartwatch and a personal assistant. With its advanced voice recognition and artificial intelligence capabilities, VoxiPod can perform tasks like scheduling appointments, answering queries, and even controlling smart home devices, all from your wrist."],
            ["Electronics", "LuminoGlo", 55, 21, "productFolder/73tR1OKiyNn23Ol7bYvpN9rz3rebwwFxXbdPB9Bz.jpg", "The LuminoGlo is an innovative wireless charging dock that not only charges your devices but also doubles as a stylish ambient light source. Its sleek design features an array of soft, customizable LED lights that create a soothing atmosphere while your devices charge wirelessly, making it the perfect addition to your bedside table or workspace."],
            ["Electronics", "SonicShade", 88, 24, "productFolder/OmGZvMjN1xZTwkmwxflNBvFyvvSxgKSnN5IYPldQ.jpg", "The SonicShade is a revolutionary noise-cancellation headset designed for immersive audio experiences. It utilizes advanced soundwave manipulation technology to create a tranquil acoustic environment wherever you go. Whether you're traveling, studying, or simply seeking a moment of tranquility, the SonicShade allows you to escape into your own world of sound."],
            ["Electronics", "NeoGrip", 114, 12, "productFolder/dMM4yheGCmGRAdJfI3wPndk8Xlr7PV7vqf1pkjGo.jpg", "The NeoGrip is a futuristic gaming controller that takes your gaming experience to the next level. With its ergonomic design, haptic feedback, and ultra-responsive buttons, the NeoGrip offers unparalleled precision and control. It's compatible with all major gaming platforms, ensuring that you can enjoy your favorite games with maximum comfort and accuracy."],
            ["Electronics", "X-StreamVR", 310, 33, "productFolder/NGUdVJ7ucpP4TarqYDX5cMI8uJFyrIBpI7qzP1JE.jpg", "The X-StreamVR is a groundbreaking virtual reality headset that transports you into a world of immersive entertainment. Its high-definition display, wide field of view, and motion tracking technology create an unparalleled VR experience. With the X-StreamVR, you can explore virtual worlds, play games, and watch movies as if you were truly part of the action."],
        ];
        
        // \App\Models\User::factory(10)->create();
        $categoryIndex = 0;
        $productNameIndex = 1;
        $priceIndex = 2;
        $productStock = 3;
        $productImageIndex = 4;
        $descriptionIndex = 5;

        for($i=0; $i < count($clothingApparel); $i++) {
            //Will stil generate product_Description and price from product factory file
            \App\Models\Products::factory()->create([
                'product_name' => $clothingApparel[$i][$productNameIndex],
                'category' => $clothingApparel[$i][$categoryIndex],
                'product_description' => $clothingApparel[$i][$descriptionIndex],
                'price' => $clothingApparel[$i][$priceIndex],
                'product_stock' => $clothingApparel[$i][$productStock],
                'product_image' => $clothingApparel[$i][$productImageIndex],
            ]);
        }
        for($i=0; $i < count($electronicsApparel); $i++) {
            //Will stil generate product_Description and price from product factory file
            \App\Models\Products::factory()->create([
                'product_name' => $electronicsApparel[$i][$productNameIndex],
                'category' => $electronicsApparel[$i][$categoryIndex],
                'product_description' => $electronicsApparel[$i][$descriptionIndex],
                'price' => $electronicsApparel[$i][$priceIndex],
                'product_stock' => $electronicsApparel[$i][$productStock],
                'product_image' => $electronicsApparel[$i][$productImageIndex],
            ]);
        }
        
         $user = \App\Models\User::factory()->create([
             'first_name' => 'Joshua',
             'last_name' => 'Lumanog',
             'email' => 'joshua@example.com',
         ]);

/*          $product_id = \App\Models\Products::factory()->create([
            'product_name' => "test product name",
            'category' => "test category",
        ]); */

         
/*          \App\Models\Carts::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product_id->id
         ]); */
    }
}
