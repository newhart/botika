<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileClientController extends Controller
{
    public function update(User $user,  Request $request)
    {
        $request->validate(['image' => 'required']);
        $user->load('profile.image');
        if ($user->profile?->image?->image) {
            $user->update($this->extractData($user, $request));
        } else {
            $profile = Profile::create([
                'user_id' => $user->id
            ]);
            Image::create([
                'immageable_type' => 'App\Models\Profile',
                'immageable_id' => $profile->id,
                'image' => $this->extractData($user, $request)['image']
            ]);
        }
    }

    private function extractData(User $user, Request $request)
    {
        $data = $request->all();
        /** @var UploadedFile|null $image */
        $image = $request->image;
        if ($image === null || $image->getError()) {
            return $data;
        }
        if ($user->profile?->image?->image) {
            Storage::disk('public')->delete($user->profile?->image?->image);
        }
        $data['image'] = $image->store('profiles', 'public');
        return $data;
    }
}
