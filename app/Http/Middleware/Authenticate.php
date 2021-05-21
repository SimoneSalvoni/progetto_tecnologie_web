<?php

namespace App\Http\Middleware;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Log;
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
