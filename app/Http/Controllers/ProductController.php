<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        if(request('category')) {
            $products = Product::where('category_id', request('category'))->get();
        }

        if(request('search')) {
            $products = $products->filter(function ($product, $key) {
                if (stripos($product->name, request('search')) !== false) {
                    return true;
                }
                return false;
            });
        }

        return view('products.index', [
            'products' => $products,
            'categories' => $categories
        ]);

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('can:product-control');

        return view('admin.products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('can:product-control');

        $product = new Product(request()->validate([
            'name' => 'required',
            'avatar_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]));


        if ($request->has('avatar_photo')) {
            // Get image file
            $image = $request->file('avatar_photo');
            // Make a image name based on user name and current timestamp
            $name = Str::slug('_'.time());
            // Define folder path
            $folder = 'img/products/avatars/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $product->avatar_photo = $filePath;
        }

        if ($request->has('product_photo')) {
            // Get image file
            $image = $request->file('product_photo');
            // Make a image name based on user name and current timestamp
            $name = Str::slug('_'.time());
            // Define folder path
            $folder = 'img/products/products/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $product->product_photo = $filePath;
        }

        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('can:product-control');

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('can:product-control');

        $product->update(request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]));

        if ($request->has('avatar_photo')) {
            // Get image file
            $image = $request->file('avatar_photo');
            // Make a image name based on user name and current timestamp
            $name = Str::slug('_'.time());
            // Define folder path
            $folder = 'img/products/avatars/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $product->avatar_photo = $filePath;
        }

        if ($request->has('product_photo')) {
            // Get image file
            $image = $request->file('product_photo');
            // Make a image name based on user name and current timestamp
            $name = Str::slug('_'.time());
            // Define folder path
            $folder = 'img/products/products/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $product->product_photo = $filePath;
        }

        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('can:product-control');

        $product->delete();

        return back();
    }
}
