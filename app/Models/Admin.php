<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $guarded = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->morphMany('App\Models\Post', 'authorable');
    }
    
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'authorable');
    }

    public function hasPermission($route){
        $routes = $this->routes();
        return in_array($route,$routes) ? true : false ;
    } 
    
    public function routes(){
        return ['admin.index','post.index'];
    }

}
