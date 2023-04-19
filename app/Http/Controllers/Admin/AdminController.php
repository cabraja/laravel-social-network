<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Media\Image;
use App\Models\Message;
use App\Models\Post\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $posts = Post::paginate(5 ,['*'], 'postPage');
        $users = User::paginate(5 , ['*'], 'userPage');
        $imageCount = Image::all()->count();
        $logs = Log::paginate(8 , ['*'] ,'logPage');
        $messages = Message::paginate(5, ['*'], 'mesPage');

        return view('admin.dashboard' , ['posts' => $posts, 'users' => $users, 'imageCount' => $imageCount, 'logs' => $logs, 'messages' => $messages]);
    }
}
