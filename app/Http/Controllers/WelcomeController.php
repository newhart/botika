<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {
        $products  = Product::latest()->with(['images'])->paginate(10);
        return view('welcome', compact('products'));
    }
}
