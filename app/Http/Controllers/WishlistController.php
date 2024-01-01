<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function  index(User $user, Product $product): View
    {
        $wishlist =  Wishlist::updateOrCreate([
            'name' => $product->name,
            'user_id' => $user->id
        ]);
        $wishlist->products()->syncWithoutDetaching($product->id);
        $wishlists = Wishlist::whereHas('user', fn ($query)  => $query->where('user_id', $user->id))
            ->with('products')
            ->get();
        return view('wishlist.index', compact('wishlists'));
    }
}
