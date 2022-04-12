<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; //Memanggil model product

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Isian tabel product
        $products = [
            // baris 1
            [
                'name' => 'Silverqueen',
                'price' => 10000,
                'type' => 'makanan',
                'expired_at' => '2022-10-01'
            ],
            // baris 2
            [
                'name' => 'Nescafe',
                'price' => 10000,
                'type' => 'minuman',
                'expired_at' => '2022-10-01'
            ]
        ];

        // di looping insert
        foreach ($products as $product) {
            // insert ke tabel product
            Product::create([
                'name' => $product['name'],
                'price' => $product['price'],
                'type' => $product['type'],
                'expired_at' => $product['expired_at']
            ]);
        }
    }
}
