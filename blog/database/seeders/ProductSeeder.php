<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Watch',
            'price' => 19.99,
            'description' => 'This is watch 1.',
            'image' => "https://picsum.photos/200/300"
        ]);

        DB::table('products')->insert([
            'product_name' => 'Watch 2',
            'price' => 29.99,
            'description' => 'This is watch 2.',
            'image' => "https://picsum.photos/200/300"
        ]);

        DB::table('products')->insert([
            'product_name' => 'Watch 3',
            'price' => 39.99,
            'description' => 'This is watch 3.',
            'image' => "https://picsum.photos/200/300"
        ]);

        DB::table('products')->insert([
            'product_name' => 'Watch 4',
            'price' => 49.99,
            'description' => 'This is watch 4.',
            'image' => "https://picsum.photos/200/300"
        ]);
        DB::table('products')->insert([
            'product_name' => 'Watch 5',
            'price' => 59.99,
            'description' => 'This is watch 5.',
            'image' => "https://picsum.photos/200/300"
        ]);

        DB::table('products')->insert([
            'product_name' => 'Purse 1',
            'price' => 69.99,
            'description' => 'This is Purse 1.',
            'image' => "https://picsum.photos/200/300"
        ]);
        DB::table('products')->insert([
            'product_name' => 'Purse 2',
            'price' => 79.99,
            'description' => 'This is Purse 2.',
            'image' => "https://picsum.photos/200/300"
        ]);
        DB::table('products')->insert([
            'product_name' => 'Purse 3',
            'price' => 89.99,
            'description' => 'This is Purse 3.',
            'image' => "https://picsum.photos/200/300"
        ]);
        DB::table('products')->insert([
            'product_name' => 'Purse 4',
            'price' => 99.99,
            'description' => 'This is Purse 4.',
            'image' => "https://picsum.photos/200/300"
        ]);
        DB::table('products')->insert([
            'product_name' => 'Purse 5',
            'price' => 100.99,
            'description' => 'This is Purse 5.',
            'image' => "https://picsum.photos/200/300"
        ]);
       

        // Insert more dummy data as needed
    }
}
