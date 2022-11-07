<?php

namespace App\Services\Auth;


interface AuthService
{
    public function userLogin(array $data);
    public function userRegister(array $data);
}
