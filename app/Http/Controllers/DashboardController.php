<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk   = Product::count();
        $totalStok     = Product::sum('stock');
        $totalKategori = Category::count();

        // Produk dengan stok menipis atau habis (<= 10)
        $stokMenipis = Product::with('category')
            ->where('stock', '<=', 10)
            ->orderBy('stock')
            ->limit(5)
            ->get();

        $kategoris = Category::withCount('products')->get();

        return view('toko.dashboard', compact(
            'totalProduk', 'totalStok', 'totalKategori', 'stokMenipis', 'kategoris'
        ));
    }
}