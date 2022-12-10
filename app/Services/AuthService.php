<?php

namespace App\Services;

use App\Traits\GeneralTrait;

class AuthService
{
    use GeneralTrait;

    public function login($request)
    {
        $user = [
            'id' => 1,
            'username' => $request->username
        ];

        $data['login_date'] = new \DateTime;
        $data['token'] = $this->generateJwt($user);

        return $data;
    }
}
