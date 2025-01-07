<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        // $faker = Faker::create();
        $faker = Faker::create('id_ID');

        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $createdAt = $faker->dateTimeBetween('-1 years', 'now');
            $updatedAt = $faker->dateTimeBetween($createdAt, 'now');
            $data[] = [
                'order_id' => Str::random(8),
                'order_name' => $faker->name,
                'order_phone' => $faker->phoneNumber,
                'order_message' => $faker->sentence,
                'product_sku' => strtoupper($faker->lexify('PROD????')),
                'product_name' => $faker->word,
                'product_type' => $faker->randomElement(['Electronics', 'Clothing', 'Accessories']),
                'product_category' => $faker->randomElement(['Mobile', 'Laptop', 'Shoes']),
                'product_brand' => $faker->company,
                'order_is_file' => $faker->boolean,
                'product_is_promo' => $faker->boolean,
                'product_amount' => $faker->numberBetween(1, 10),
                'product_price_unit' => $faker->numberBetween(5000, 100000), 
                'product_price_discount' => $faker->numberBetween(0, 5000), // Diskon dalam Rupiah
                'product_percentage_discount' => $faker->numberBetween(0, 90), // Diskon dalam persen
                'product_price_totals' => $faker->numberBetween(1000, 1000000),
                'product_payment_method' => $faker->randomElement(['cod', 'online']),
                'product_delivery' => $faker->randomElement(['cod', 'delivery']),
                'status' => $faker->randomElement(['pending', 'waiting payment', 'preparing', 'shipping', 'success']),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ];
        }

        DB::table('orders')->insert($data);
    }
}
