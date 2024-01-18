<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Request $request): JsonResponse
    {
        //get cart by id 
        $cart = \Cart::get($request->id);
        if ($cart) {
            \Cart::update($request->d,  ['quantity' => $request->quantity]);
        } else {
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'slug' => $request->page_title,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->image,
                    'price_before' => $request->compare_at_price
                )
            ]);
        }
        return response()->json(['success' => true]);


        event(new \App\Events\CartNotification('added  with success ful'));

        return response()->json(['added' => true]);
    }

    public function removeCart(int $id): JsonResponse
    {
        \Cart::remove($id);
        event(new \App\Events\RemoveCartEvent('remove to cart with success'));
        return response()->json([
            'success' => true
        ]);
    }

    public function  list(): JsonResponse
    {
        $carts = \Cart::getContent();
        $total = \Cart::getTotal();
        $sub_total = \Cart::getSubTotal();
        return response()->json([
            'carts' => $this->getContentCartToArrray($carts),
            'total' => $total,
            'sub_total' => $sub_total
        ]);
    }

    private function getContentCartToArrray($carts): array
    {
        $datas = [];

        foreach ($carts as $cart) {
            $datas[] = [
                'id' => $cart->id,
                'name' => $cart->name,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'price_before' => $cart->attributes['price_before'],
                'image' => $cart->attributes['image']
            ];
        }

        return $datas;
    }

    public function countCarts(): JsonResponse
    {
        $carts = \Cart::getContent();
        $count = \Cart::getContent()->count();
        $total = \Cart::getTotal();
        return response()->json([
            'carts' => $this->getContentCartToArrray($carts),
            'counts' => $count,
            'total' => $total
        ]);
    }

    public function updateQuantity(int $id_cart, Request $request): JsonResponse
    {
        $cart = \Cart::update($id_cart,  ['quantity' => $request->quantity]);

        if ($cart) {
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function removeToCart(int $id): JsonResponse
    {
        \Cart::remove($id);
        return response()->json(['removed' => true]);
    }
}
