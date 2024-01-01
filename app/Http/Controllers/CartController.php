<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request): JsonResponse
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'slug' => $request->page_title,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        return response()->json(['added' => true]);
    }

    public function removeCart(int $id): RedirectResponse
    {
        \Cart::remove($id);
        return redirect()->route('home')->with('success', 'cart removed with success');
    }

    public function  list(): View
    {
        $carts = \Cart::getContent()->toArray();
        return view('cart.list', compact('carts'));
    }

    public function countCarts(): JsonResponse
    {
        $cart = \Cart::getContent();
        $count = \Cart::getContent()->count();
        return response()->json([
            'carts' => $cart,
            'counts' => $count
        ]);
    }

    public function removeToCart(int $id): JsonResponse
    {
        \Cart::remove($id);
        return response()->json(['removed' => true]);
    }
}
