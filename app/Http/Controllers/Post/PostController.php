<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Media\Image;
use App\Models\Media\ProfilePicture;
use App\Models\Post\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Json;

class PostController extends Controller
{
    public function index(Request $request){
        if(!$request->keyword){
            $request->keyword = "";
        }
        if(!$request->sortBy){
            $request->sortBy = "desc";
        }

        $posts = Post::where('body', 'Like', '%'.$request->keyword.'%')->orderBy('created_at', $request->sortBy)->paginate(5);
        return view('posts.posts' ,['posts' => $posts]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $post = Post::create([
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        if($request->image){
            $path = Storage::disk('s3')->put('images', $request->image);
            $path = Storage::disk('s3')->url($path);

            $pp = new Image(['url' => $path]);

            $post->image()->save($pp);
        }

        // MAKE LOG
        $log = Log::create([
            'message' => 'User has just created a post.',
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts');

    }

    public function destroy(Request $request, Post $post){

        $isDeleted = $post->delete();

        if($isDeleted){
            // MAKE LOG
            $log = Log::create([
                'message' => 'User has just deleted their post.',
                'user_id' => auth()->user()->id
            ]);

            return back()->with('message', 'Successful delete')->with('status', '200');
        }else{
            return back()->with('message', 'Something went wrong...')->with('status', '400');
        }

    }


    public function edit(Post $post){

        return view('admin.editPost' , ['post' => $post]);
    }

    public function update(Request $request, Post $post){
        $validated = $request->validate([
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->body != $post->body){
            $post->body = $request->body;
        };
        if($request->image){
            $path = Storage::disk('s3')->put('images', $request->image);
            $path = Storage::disk('s3')->url($path);

            $pp = new Image(['url' => $path]);

            if(!$post->image()->exists()){
                $post->image()->save($pp);
            }else{
                $post->image()->update(['url' => $pp->url]);
            }

        }

        $post->save();

        return back()->with('message', 'Successful edit.');
    }

}
