<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        // 1️⃣ If not logged in, send to login
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        /** @var User $user */
        $user = Auth::user();

        // 2️⃣ If logged in but not admin, send somewhere safe
        if (! $user->isAdmin()) {
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
