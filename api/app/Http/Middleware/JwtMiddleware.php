<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class JwtMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $credentials = null;
        $token = explode(' ',$request->header('Authorization'));

        if (empty($request->header('Authorization')) || !array_key_exists(1,$token)) {
            return response()->json([
                'errors' => 'Access token is missing or invalid',
            ], 401);
        }


        try {
            //We can use this to get the user details used for setting up the token
            $credentials = JWT::decode($token[1], env('JWT_SECRET'), ['HS256']);

        } catch(ExpiredException $e) {


            dd($e->getMessage());
            return response()->json([
                'errors' => 'Access token is missing or invalid',
            ], 401);

        } catch(Exception $e) {

            dd($e->getMessage());

            return response()->json([
                'errors' => 'Access token is missing or invalid',
            ], 401);

        }


        if (empty($credentials)) {
            return response()->json([
                'errors' => 'Access token is missing or invalid',
            ], 401);
        }

        return $next($request);

    }



}