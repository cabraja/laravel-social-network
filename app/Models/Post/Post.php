<?php

namespace App\Models\Post;

use App\Models\Like;
use App\Models\Media\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id'
    ];

    public function image(){
        return $this->hasOne(Image::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
