@extends('layouts.toko')

@section('title', 'Detail Produk')

@section('content')
    <div class="card">
        <div class="header">
            <h1>Detail Produk</h1>
            <a href="{{ route('products.index') }}" class="btn btn-gray">&larr; Kembali</a>
        </div>

        <dl>
            <dt>ID</dt><dd>{{ $product->id }}</dd>
            <dt>Nama Produk</dt><dd>{{ $product->name }}</dd>
            <dt>Kategori</dt><dd>{{ $product->category->name }}</dd>
            <dt>Harga</dt><dd>Rp {{ number_format($product->price, 0, ',', '.') }}</dd>
            <dt>Stok</dt>
            <dd>
                {{ $product->stock }}
                @if ($product->stock == 0)
                    <span class="badge badge-red">Habis</span>
                @elseif ($product->stock <= 10)
                    <span class="badge badge-orange">Menipis</span>
                @else
                    <span class="badge badge-green">Aman</span>
                @endif
            </dd>
            <dt>Dibuat</dt><dd>{{ $product->created_at->format('d M Y H:i') }}</dd>
            <dt>Diperbarui</dt><dd>{{ $product->updated_at->format('d M Y H:i') }}</dd>
        </dl>

        <div style="margin-top:20px; display:flex; gap:8px">
            <a href="{{ route('products.edit', $product->id) }}" class="btn">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                  onsubmit="return confirm('Hapus produk ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-red">Hapus</button>
            </form>
        </div>
    </div>
@endsection
