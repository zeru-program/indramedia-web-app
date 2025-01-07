<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['indramedia', 'endez'];
        $statuses = ['active', 'draft'];

        for ($i = 2; $i <= 80; $i++) {
            Products::create([
                'sku' => 'SKU-' . Str::upper(Str::random(5)) . $i,
                'image_path' => "products/A5qDGnW698H2MjLNdtP5FGb5kJdcH79IxmNSTKyG.png",
                'name' => 'Product ' . $i,
                'description' => 'This is the description for product ' . $i,
                'type' => 'Type ' . rand(1, 5),
                'category' => 'Category ' . rand(1, 5),
                'brand' => $brands[array_rand($brands)],
                'price' => rand(10000, 500000),
                'stock' => rand(10, 100),
                'is_populer' => rand(0, 1),
                'is_featured' => rand(0, 1),
                'is_promo' => 0,
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
