<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        // TODO  create the order  here and add all relationship
        dd($request->all());
    }

    public function index()
    {
        $carts = \Cart::getContent()->toArray();
        $total = \Cart::getTotal();
        return view('checkout.index', compact('carts',  'total'));
    }
}
