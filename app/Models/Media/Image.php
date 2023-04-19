<?php

namespace App\Models\Media;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
