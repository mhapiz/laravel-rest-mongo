<?php

namespace App\Repositories\Auth;


interface AuthRepository
{
    public function userLogin(array $data);
    public function userRegister(array $data);
}
