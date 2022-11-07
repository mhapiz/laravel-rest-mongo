<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepositoryImplement implements AuthRepository
{
    private $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function userLogin(array $data)
    {

        $token = Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        if (!$token) {
            $result = ['status' => 401];

            $result['message'] = 'Login Failed';

            $user = Auth::user();

            $result['data']['user'] = $user;
            $result['data']['token'] = $token;
        } else {
            $result = ['status' => 200];

            $result['message'] = 'Login success';

            $user = Auth::user();

            $result['data']['user'] = $user;
            $result['data']['token'] = $token;
            $result['data']['tokenType'] = 'Bearer';
        }

        return $result;
    }

    public function userRegister(array $data)
    {
        $data = $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $result = ['status' => 201];
        $result['message'] = 'Register success, please login';
        $result['data']['user'] = $data;

        return $result;
    }
}
