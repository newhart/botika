<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request, Product $product): RedirectResponse
    {
        if ($product) {
            $product->reviews()->create($request->validated());
            return redirect()->back()->with('success', 'comment added with success');
        }
        return redirect()->back()->with('error', 'Product not found');
    }
}
