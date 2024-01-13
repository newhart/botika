<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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

        event(new \App\Events\CartNotification('added  with success ful'));

        return response()->json(['added' => true]);
    }

    public function removeCart(int $id): JsonResponse
    {
        \Cart::remove($id);
        return response()->json([
            'success' => true
        ]);
    }

    public function  list(): View
    {
        $carts = \Cart::getContent()->toArray();
        return view('cart.list', compact('carts'));
    }

    public function countCarts(): JsonResponse
    {
        $carts = \Cart::getContent();
        $datas = [];
        foreach ($carts as $key => $cart) {
            $datas[] = [
                'id' => $cart->id,
                'name' => $cart->name,
                'quantity' => $cart->quantity,
                'image' => $cart->attributes['image']
            ];
        }
        $count = \Cart::getContent()->count();
        return response()->json([
            'carts' => $datas,
            'counts' => $count
        ]);
    }

    public function removeToCart(int $id): JsonResponse
    {
        \Cart::remove($id);
        return response()->json(['removed' => true]);
    }
}
