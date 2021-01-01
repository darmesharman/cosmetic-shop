@extends('layouts.panel')

@section('content')
<form action="{{ route('products.update', ['product' => $product]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="avatar_photo">Avatar photo</label>
        <input type="file" accept="image/*" id="avatar_photo" name="avatar_photo" class="form-control">
        @error('avatar_photo')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="product_photo">Product photo</label>
        <input type="file" accept="image/*" id="product_photo" name="product_photo" class="form-control">
        @error('product_photo')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" rows="2" required>{{ $product->description }}</textarea>
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
        @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if ($product->category_id == $category->id) selected @endif
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">Edit product</button>
</form>

@endsection
