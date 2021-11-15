<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function authorable(){
        return $this->morphTo();
    }

    public function medias(){
        return $this->morphMany(Image::class, 'mediaable');
    }
    
    public function replys(){
        return $this->morphMany('App\Models\Reply', 'replyable');
    }
    public function likedUser(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
