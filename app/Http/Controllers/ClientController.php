<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Profile;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ClientController extends Controller
{
    public function index(): View
    {
        /** @var $user new User() */
        $user = User::where('id', auth()->user()->id)->with(['profile' => function ($query) {
            $query->with('image');
        }])->first();
        $wishlists = Wishlist::where('user_id', $user->id)->paginate(10);
        $total_wishlist = Wishlist::where('user_id', auth()->user()->id)->count();
        $address = Adresse::where('user_id', auth()->user()->id)
            ->latest()
            ->paginate(10);
        return view('client.index', compact('user', 'wishlists', 'total_wishlist', 'address'));
    }

    public function remove_wishlist(Wishlist $wishlist): RedirectResponse
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)
            ->where('id', $wishlist->id)->first();
        $wishlist->delete();
        return redirect()->back();
    }

    public function remove_adress(Adresse $adresse)
    {
        $address = Adresse::where('user_id', auth()->user()->id)
            ->where('id', $adresse->id)->first();
        $address->delete();
        return redirect()->route('dashboard.client');
    }

    public function update_adress(Adresse $adresse, Request $request): JsonResponse
    {
        $adresse->update($request->all());
        return response()->json(['success' => true]);
    }

    public function store_address(Request $request): JsonResponse
    {
        $adresse = Adresse::create($request->all());
        if ($adresse) {
            return response()->json(['success' => true]);
        }
        return response()->json(['error' => true]);
    }

    public function update_profile(User $user, Request $request): JsonResponse
    {
        $has_profile = User::whereHas('profile')->where('id', $user->id)->first();
        if ($has_profile) {
            $profile = Profile::where('user_id', $user->id)->first();
        } else {
            $profile =  Profile::create([
                'addresse' => $request->address,
                'addresse2' => $request->address2,
                'pin_code' => $request->pin_code,
                'user_id' => $user->id,
                'genre' => $request->genre,
                'birth_date' => $request->birth_date,
            ]);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        $profile->update([
            'addresse' => $request->address,
            'addresse2' => $request->addresse2,
            'pin_code' => $request->pin_code,
            'genre' => $request->genre,
            'birth_date' => $request->birth_date,
        ]);

        return response()->json(['success' => true]);
    }

    public function update_login_detail(User $user, Request $request): JsonResponse
    {
        if ($request->email) {
            $user->email = $request->email;
        }

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return response()->json(['success' => $user->email]);
    }
}
