@extends('layouts.toko')

@section('title', 'Edit Produk')

@section('content')
    <div class="card">
        <div class="header"><h1>Edit Produk</h1></div>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('products._form')

            <div style="margin-top:20px; display:flex; gap:8px">
                <button type="submit" class="btn">Update</button>
                <a href="{{ route('products.index') }}" class="btn btn-gray">Batal</a>
            </div>
        </form>
    </div>
@endsection
