<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepository;
use Exception;
use Illuminate\Support\Facades\Validator;

class AuthServiceImplement implements AuthService
{
    private $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function userLogin(array $data)
    {
        $req = Validator::make($data, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($req->fails()) {
            $result['status'] = 422;
            $result['message'] = 'Failed to login';
            $result['errors'] = $req->errors();
            return $result;
        }

        return $this->authRepository->userLogin($data);
    }

    public function userRegister(array $data)
    {
        $req = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($req->fails()) {
            $result['status'] = 422;
            $result['message'] = 'Failed to register';
            $result['errors'] = $req->errors();
            return $result;
        }

        return $this->authRepository->userRegister($data);
    }
}
