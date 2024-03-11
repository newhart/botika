<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    protected $providers = ["google", "github", "facebook"]; // provider authorize

    # redirection vers le provider
    public function redirect(Request $request)
    {

        $provider = $request->provider;

        // verify if authorize
        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect(); // redirect
        }
        abort(404);
    }

    // Callback du provider
    public function callback(Request $request)
    {

        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {
            $data = Socialite::driver($request->provider)->user();
            $user = User::where('email', $data->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'name' => $data->getName(),
                    'email' => $data->getEmail(),
                    'password' => bcrypt('123456'),
                    'email_verified_at' => now()
                ]);
            }
            Auth::login($user);
            return redirect()->route('dashboard.client')->with('success', 'authetificated');
        }
        abort(404);
    }
}
