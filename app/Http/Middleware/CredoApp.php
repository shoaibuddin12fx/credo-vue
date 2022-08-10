<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CredoApp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header();

        if(!isset($header['secretcode'])){
            $msgArray = array(
                'bool' => false,
                'status' => 202,
                "message" => 'Only Authorized persons are allowed to use tracker app',
                "data" => null
            );

            $returnArray = array_merge($msgArray);
            return response()->json($returnArray, 202);
        }

        if(($header['secretcode'][0] != '67d23a9198e978368811067aa503309ccf552b628076d1318da733a5cacf1cd2')){
            $msgArray = array(
                'bool' => false,
                'status' => 202,
                "message" => 'Only Authorized persons are allowed to use tracker app',
                "data" => null
            );

            $returnArray = array_merge($msgArray);
            return response()->json($returnArray, 202);
        }

        return $next($request);
    }
}
