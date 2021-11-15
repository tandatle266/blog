<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle( $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        $name = $guards[0].'.login';

        foreach ($guards as $guard) {
            if (!Auth::guard($guard)->check()) {
                return redirect()->route($name);
            }
        }
        $model = Auth::guard($guard)->user();
        $route = $request->route()->getName();  
        if($route == "site.user_posted" || $route == "site.comment.store"){
            if($model->cant($route)){
                
                return redirect()->back()->with('error', 'Bạn không có quyền này. Liên hệ Admin ngay!!');
            }
        }
        
        return $next($request);
    }
}
