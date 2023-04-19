<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use Illuminate\Http\Request;
use Psy\Util\Json;

class LikeController extends Controller
{
    public function store(Post $post, Request $request){
        if($post->isLikedBy($request->user())){
            return response(null,409);
        }

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function destroy(Post $post, Request $request){
        $request->user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }
}
