<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPanelMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user) {
            return redirect('/home');
        }

        if ($user->role !== 'admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
