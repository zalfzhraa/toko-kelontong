<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    public function run(): void
    {
        $sembako = Category::create(['name' => 'Sembako']);
        $minuman = Category::create(['name' => 'Minuman']);
        $snack   = Category::create(['name' => 'Makanan Ringan']);
        $rt      = Category::create(['name' => 'Kebutuhan Rumah Tangga']);

        $items = [
            [$sembako, 'Beras 5 kg', 68000, 25],
            [$sembako, 'Minyak Goreng 1 L', 18000, 8],
            [$sembako, 'Gula Pasir 1 kg', 16000, 40],
            [$minuman, 'Teh Botol 450 ml', 5000, 60],
            [$minuman, 'Air Mineral 600 ml', 3500, 0],
            [$snack,   'Keripik Singkong', 8000, 15],
            [$snack,   'Biskuit Kelapa', 7500, 5],
            [$rt,      'Sabun Cuci Piring', 12000, 20],
            [$rt,      'Deterjen 800 g', 21000, 12],
        ];

        foreach ($items as [$kategori, $nama, $harga, $stok]) {
            Product::create([
                'category_id' => $kategori->id,
                'name'        => $nama,
                'price'       => $harga,
                'stock'       => $stok,
            ]);
        }
    }
}