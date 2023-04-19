<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'email' => 'required',
            'password' => ['required']
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('message', 'Invalid login details')->with('status', '401');
        }

        // MAKE LOG
        $log = Log::create([
            'message' => 'User has just logged in.',
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts');
    }

    public function logout(Request $request){
        // MAKE LOG
        $log = Log::create([
            'message' => 'User has just logged out.',
            'user_id' => auth()->user()->id
        ]);
        auth()->logout();

        return redirect()->route('posts');
    }
}
