@extends('layouts.toko')

@section('title', 'Dashboard - Toko Pak Wowok')

@section('content')
    <div class="header">
        <h1>Dashboard</h1>
        <a href="{{ route('products.create') }}" class="btn">+ Tambah Produk</a>
    </div>

    <div class="stats">
        <div class="stat"><small>Jumlah Produk</small><strong>{{ $totalProduk }}</strong></div>
        <div class="stat"><small>Total Stok</small><strong>{{ number_format($totalStok, 0, ',', '.') }}</strong></div>
        <div class="stat"><small>Jumlah Kategori</small><strong>{{ $totalKategori }}</strong></div>
    </div>

    <div class="card">
        <h2 style="margin-bottom:12px">Stok Menipis / Habis</h2>
        <table>
            <thead><tr><th>Produk</th><th>Kategori</th><th>Stok</th></tr></thead>
            <tbody>
                @forelse ($stokMenipis as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->category->name }}</td>
                        <td>
                            @if ($p->stock == 0)
                                <span class="badge badge-red">Habis</span>
                            @else
                                <span class="badge badge-orange">{{ $p->stock }} (menipis)</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="empty">Semua stok aman</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card">
        <h2 style="margin-bottom:12px">Produk per Kategori</h2>
        <table>
            <thead><tr><th>Kategori</th><th>Jumlah Produk</th></tr></thead>
            <tbody>
                @forelse ($kategoris as $k)
                    <tr><td>{{ $k->name }}</td><td>{{ $k->products_count }}</td></tr>
                @empty
                    <tr><td colspan="2" class="empty">Belum ada kategori</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
