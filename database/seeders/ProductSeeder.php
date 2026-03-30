<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Sony WH-1000XM5 Wireless Headphones',
                'description' => 'Premium noise-cancelling headphones with exceptional sound quality and 30-hour battery life.',
                'price' => 399.99,
                'stock' => 25,
                'image' => json_encode([
                    'https://images.pexels.com/photos/3394666/pexels-photo-3394666.jpeg'
                ]),
            ],
            [
                'title' => 'Apple Watch Series 9',
                'description' => 'Advanced smartwatch with health tracking, fitness monitoring, and sleek design.',
                'price' => 429.00,
                'stock' => 40,
                'image' => json_encode([
                    'https://images.pexels.com/photos/31406895/pexels-photo-31406895.jpeg'
                ]),
            ],
            [
                'title' => 'Dell XPS 13 Laptop',
                'description' => 'Powerful ultra-thin laptop with stunning display and high performance.',
                'price' => 1299.99,
                'stock' => 15,
                'image' => json_encode([
                    'https://images.pexels.com/photos/6372939/pexels-photo-6372939.jpeg'
                ]),
            ],
            [
                'title' => 'Keychron K8 Mechanical Keyboard',
                'description' => 'Wireless mechanical keyboard with RGB lighting and hot-swappable switches.',
                'price' => 99.99,
                'stock' => 60,
                'image' => json_encode([
                    'https://images.pexels.com/photos/13094372/pexels-photo-13094372.jpeg'
                ]),
            ],
            [
                'title' => 'Razer DeathAdder V3 Pro Mouse',
                'description' => 'Ultra-lightweight gaming mouse with precision tracking and ergonomic design.',
                'price' => 149.99,
                'stock' => 50,
                'image' => json_encode([
                    'https://images.pexels.com/photos/33149947/pexels-photo-33149947.jpeg'
                ]),
            ],
            [
                'title' => 'Samsung Galaxy Buds2 Pro',
                'description' => 'Wireless earbuds with active noise cancellation and immersive sound.',
                'price' => 179.99,
                'stock' => 70,
                'image' => json_encode([
                    'https://images.pexels.com/photos/6867253/pexels-photo-6867253.jpeg'
                ]),
            ],
            [
                'title' => 'JBL Charge 5 Speaker',
                'description' => 'Portable waterproof speaker with powerful bass and long battery life.',
                'price' => 149.95,
                'stock' => 35,
                'image' => json_encode([
                    'https://images.pexels.com/photos/9767549/pexels-photo-9767549.jpeg'
                ]),
            ],
            [
                'title' => 'Samsung T7 Portable SSD 1TB',
                'description' => 'High-speed portable SSD with compact design and durable build.',
                'price' => 109.99,
                'stock' => 80,
                'image' => json_encode([
                    'https://images.pexels.com/photos/5222605/pexels-photo-5222605.jpeg'
                ]),
            ],
            [
                'title' => 'Amazon Echo (5th Gen)',
                'description' => 'Smart speaker with Alexa for voice control, music, and home automation.',
                'price' => 99.99,
                'stock' => 45,
                'image' => json_encode([
                    'https://images.pexels.com/photos/4790267/pexels-photo-4790267.jpeg'
                ]),
            ],
            [
                'title' => 'Meta Quest 3 VR Headset',
                'description' => 'Next-gen VR headset with immersive experiences and mixed reality features.',
                'price' => 499.99,
                'stock' => 20,
                'image' => json_encode([
                    'https://images.pexels.com/photos/8728558/pexels-photo-8728558.jpeg'
                ]),
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
