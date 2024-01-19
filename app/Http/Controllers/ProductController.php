<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(string $slug): View
    {
        $product = Product::where('page_title', $slug)
            ->with(['images', 'categories', 'variants', 'reviews'])
            ->first();
        return view('products.index', compact('product'));
    }

    public function index()
    {
        $products = Product::with(['categories', 'images'])
            ->latest()
            ->paginate(4);
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
            ->latest()
            ->paginate(10);

        $products->map(function ($product) {
            $product->image = $product->images[0]?->imageUrl();
        });


        return response()->json($products);
    }
}
