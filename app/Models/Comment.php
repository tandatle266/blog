<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function medias(){
        return $this->morphOne(Image::class, 'mediaable'); // 1 comment có 1 hinh`
    }

    public function replys(){
        return $this->morphMany('App\Models\Reply', 'replyable');
    }
    public function authorable(){
        return $this->morphTo();  
    }
    public function comments(){
        return $this->hasMany(Reply::class,'id','cmt_id');
    }
}
