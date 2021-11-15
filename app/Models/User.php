<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    public function posts(){
        return $this->morphMany('App\Models\Post', 'authorable');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'authorable');
    }

    public function likedPosts(){
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    public function permission(){
        return ['comment.create','post.create','site.user_posted'];
    } 

    public function hasPermission($route){
        $data = [];
       
        foreach ($this->routes as $role) {
            $permission = json_decode($role)->name;            
               array_push($data,$permission);       
        }
       
        //dd( $data );
        return in_array($route,$data) ? true : false;
    }

    public function routes(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
