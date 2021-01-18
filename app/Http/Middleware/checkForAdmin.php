<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class checkForAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $is_admin = User::where('id', auth()->id())->first()->admin;
        if ($is_admin) {
            return $next($request);
        }
        return redirect('/');
    }
}
