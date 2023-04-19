<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Media\ProfilePicture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{

    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'username' => ['required', 'max:24', 'regex:/^(?=[a-zA-Z0-9.]{6,20}$)(?!.*[.]{2})[^.].*[^.]$/'],
            'email' => 'required|unique:users',
            'password' => ['required','confirmed', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1
        ]);

        if($request->image){
            $path = Storage::disk('s3')->put('profile-pictures', $request->image);
            $path = Storage::disk('s3')->url($path);

            $pp = new ProfilePicture(['url' => $path]);

            $user->profilePicture()->save($pp);
        }

        // MAKE LOG
        $log = Log::create([
            'message' => 'User registered.',
            'user_id' => $user->id
        ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('posts');

    }
}
