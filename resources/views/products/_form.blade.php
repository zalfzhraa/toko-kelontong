<label for="category_id">Kategori</label>
<select name="category_id" id="category_id">
    <option value="">-- Pilih kategori --</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}"
            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>
@error('category_id')
    <small class="error">{{ $message }}</small>
@enderror

<label for="name">Nama Produk</label>
<input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}">
@error('name')
    <small class="error">{{ $message }}</small>
@enderror

<label for="price">Harga (Rp)</label>
<input type="number" name="price" id="price" min="0" value="{{ old('price', $product->price ?? '') }}">
@error('price')
    <small class="error">{{ $message }}</small>
@enderror

<label for="stock">Stok</label>
<input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $product->stock ?? '') }}">
@error('stock')
    <small class="error">{{ $message }}</small>
@enderror