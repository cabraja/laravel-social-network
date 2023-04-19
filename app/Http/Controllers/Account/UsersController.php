<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Media\Image;
use App\Models\Post\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;
use Psy\Util\Json;

class UsersController extends Controller
{
    public function index(Request $request){
        if(!$request->keyword){
            $request->keyword = "";
        }
        if(!$request->sortBy){
            $request->sortBy = "desc";
        }

        $users = User::where('username', 'Like', '%'.$request->keyword.'%')->orderBy('created_at', $request->sortBy)->paginate(5);
        return view('account.users', ['users' => $users]);
    }

    public function destroy(User $user){
        $user->delete();

        $posts = Post::paginate(5 ,['*'], 'postPage');
        $users = User::paginate(5 , ['*'], 'userPage');
        $imageCount = Image::all()->count();
        $logs = Log::paginate(8 , ['*'] ,'logPage');

        return view('admin.dashboard' , ['posts' => $posts, 'users' => $users, 'imageCount' => $imageCount, 'logs' => $logs]);
    }
}
