<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Media\ProfilePicture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Json;

class ProfilePictureController extends Controller
{
    public function update(Request $request, User $user){
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $path = Storage::disk('s3')->put('images', $request->image);
        $path = Storage::disk('s3')->url($path);

        if($user->profilePicture){
            $user->profilePicture()->update([
                'url' => $path
            ]);

            // MAKE LOG
            $log = Log::create([
                'message' => 'User has just updated their profile picture.',
                'user_id' => auth()->user()->id
            ]);
        }else{
            $user->profilePicture()->create([
                'url' => $path
            ]);

            // MAKE LOG
            $log = Log::create([
                'message' => 'User has just add a profile picture.',
                'user_id' => auth()->user()->id
            ]);
        }

        return back();

    }
}
