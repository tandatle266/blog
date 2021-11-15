<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table = 'comment_replys'; 
    protected $guarded = [];
    
    public function replyable(){
        return $this->morphTo();  
    }
    public function comment(){
        return $this->hasOne(Comment::class,'id','cmt_id');
    }
}
