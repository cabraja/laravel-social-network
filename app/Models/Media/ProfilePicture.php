<?php

namespace App\Models\Media;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
