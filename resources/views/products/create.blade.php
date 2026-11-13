@extends('layouts.toko')

@section('title', 'Tambah Produk')

@section('content')
    <div class="card">
        <div class="header"><h1>Tambah Produk</h1></div>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            @include('products._form')

            <div style="margin-top:20px; display:flex; gap:8px">
                <button type="submit" class="btn">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-gray">Batal</a>
            </div>
        </form>
    </div>
@endsection
