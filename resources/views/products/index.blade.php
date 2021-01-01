@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container my-4 mx-auto">
        <div class="container" style="width: 90%; margin-left: auto; margin-right: auto;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="magin-bottom: 40px;">
                <h3 class="navbar-brand" href="{{ route('products.index') }}">Categories </h3>
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item {{ (!request('category')) ? "active" : "" }}">
                            <a class="nav-link" href="{{ route('products.index') }}">All</a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item {{ (request('category') == $category->id) ? "active" : ""}}">
                                <a class="nav-link" href="{{ route('products.index', ['category' => $category]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    @can('product-control')
        <form action="{{ route('products.create') }}" method="get" class="row justify-content-center my-3">
            <button type="submit" class="btn btn-primary">Add product</button>
        </form>
    @endcan

    @foreach ($products as $product)
        <li>
            <div class="d-inline-block">
                <img src="{{ asset($product->avatar_photo) }}" class="img-fluid" alt="1eyeshadow">
            </div>
            <div class="container-fluid">
                <a href="{{ route('products.show', ['product' => $product]) }}">
                    <p class="lead">{{ $product->name }}</p>
                </a>
                <p class="lead">{{ $product->price }} USD</p>
            </div>

            @can('product-control')
                <div class="row">
                    <form action="{{ route('products.edit', ['product' => $product]) }}" method="get" class="col justify-content-center my-3">
                        @csrf

                        <button type="submit" class="btn btn-info">Edit</button>
                    </form>

                    <form action="{{ route('products.destroy', ['product' => $product]) }}" method="post" class="col justify-content-center my-3">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endcan
        </li>
    @endforeach
</div>
@endsection
