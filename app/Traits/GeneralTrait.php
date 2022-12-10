<?php

namespace App\Traits;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

trait GeneralTrait {

    public function ResponseJson($status,$message,$data = null){
        $response = [
            'status' => $status,
            'message' => $message
        ];
        if($data){
            $response['data'] = $data;
        }
		return response()->json($response, $status);
	}

    protected function generateJwt($user) {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user['id'], // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + (60*60*24)*1,// Expiration time a day
            'user' => $user['username'],

        ];
        $token =  JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        return $token;

    }

    protected function decodeJwt($token){
        $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
        return $decoded;
    }


}
