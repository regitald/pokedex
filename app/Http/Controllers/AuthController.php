<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Validator;

class AuthController extends Controller
{
    use GeneralTrait;
    protected $auth_service;
    public function __construct(AuthService $auth_service)
    {
        $this->auth_service = $auth_service;
    }

    public function login(Request $request)
    {
        $rules = [
			'username'  => 'required|string'
		];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->ResponseJson(422,$validator->errors()->first());
        }

        $data = $this->auth_service->login($request);

        return $this->ResponseJson(201,"Login Success",$data);
    }
}
