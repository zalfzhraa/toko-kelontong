@extends('layouts.toko')

@section('title', 'Daftar Produk')

@section('content')
    <div class="stats">
        <div class="stat"><small>Jumlah Produk</small><strong>{{ $totalProduk }}</strong></div>
        <div class="stat"><small>Total Stok</small><strong>{{ number_format($totalStok, 0, ',', '.') }}</strong></div>
    </div>

    <div class="card">
        <div class="header">
            <h1>Daftar Produk</h1>
            <div style="display:flex; gap:10px; flex-wrap:wrap">
                <form action="{{ route('products.index') }}" method="GET" class="search">
                    <input type="text" name="q" value="{{ $q }}" placeholder="Cari nama produk...">
                    <button type="submit" class="btn btn-gray">Cari</button>
                </form>
                <a href="{{ route('products.create') }}" class="btn">+ Tambah</a>
            </div>
        </div>

        @if ($q)
            <p>Hasil pencarian untuk "<strong>{{ $q }}</strong>" ({{ $products->count() }} produk).
                <a href="{{ route('products.index') }}">Reset</a></p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th><th>Nama Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>
                            @if ($product->stock == 0)
                                <span class="badge badge-red">Habis</span>
                            @elseif ($product->stock <= 10)
                                <span class="badge badge-orange">{{ $product->stock }} (menipis)</span>
                            @else
                                <span class="badge badge-green">{{ $product->stock }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-gray btn-sm">Detail</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">Belum ada data produk</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection