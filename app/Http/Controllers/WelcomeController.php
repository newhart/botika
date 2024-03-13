<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {
        $products  = Product::latest()
            ->whereHas('images')
            ->with(['images'])->paginate(10); // get all product  paginate for 10

        $categories =  Category::inRandomOrder()
            ->limit(10)
            ->get(); // get the 10  category for random  ;
        return view('welcome', compact('products', 'categories'));
    }
}
