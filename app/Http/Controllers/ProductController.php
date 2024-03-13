<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(string $slug): View
    {
        // get the product by here slug
        $product = Product::where('page_title', $slug)
            ->whereHas('images')
            ->with(['images', 'categories', 'variants', 'reviews'])
            ->first();
        // get the related product
        $product_related = Product::whereHas('categories', fn ($q) => $q->whereIn('product_id', $product->categories->pluck('id')))
            ->whereHas('images')
            ->with(['images', 'categories'])
            ->paginate(10);

        return view('products.index', compact('product', 'product_related'));
    }

    public function index()
    {
        $products = Product::with(['categories', 'images'])
            ->whereHas('images')
            ->latest()
            ->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $product = new Product();
        return view('admin.products.create', compact('product'));
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->back()->with('success', 'Product delete with success');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function list(): JsonResponse
    {
        $products = Product::with(['categories', 'images'])
            ->whereHas('images')
            ->latest()
            ->paginate(10);
        $products->map(function ($product) {
            $product->image = $product->images[0]?->imageUrl();
        });

        return response()->json($products);
    }
}
