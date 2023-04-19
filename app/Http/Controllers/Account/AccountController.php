<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
//    function __construct(Request $request)
//    {
//        $this->middleware('auth');
//    }

    public function index(User $user){
        $posts = Post::where('user_id',$user->id)->orderByDesc('created_at')->paginate(5);
        return view('account.account', ['posts' => $posts, 'user' => $user]);
    }
}
