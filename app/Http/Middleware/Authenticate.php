<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    protected function unauthenticated($request, array $guards)
    {
        $msgArray = array(
            'bool' => false,
            'status' => 202,
            "message" => 'Invalid Login, Try again',
            "data" => null
        );

        $returnArray = array_merge($msgArray);
        abort(response()->json($returnArray, 401));

        // abort(response()->json(['error' => 'B Unauthenticated.'], 401));
    }
}
