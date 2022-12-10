<?php

namespace App\Http\Middleware;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\Key;

use Closure;

class AuthJWT
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
    {
        $token =  $request->bearerToken();
        if(!$token) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized, please provide token',
            ], 401);
        }
        try {
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
        } catch(ExpiredException $e) {
            return response()->json([
                'status' => 401,
                'message' => 'Provided access token is expired.',
            ], 402);
        } catch(Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Auth - '.$e->getMessage().' - '.$e->getFile().' - L '.$e->getLine(),
            ],(method_exists($e, 'getStatusCode')) ? $e->getStatusCode() : 500);
        }
        return $next($request);
    }
}
