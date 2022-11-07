<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AuthTest extends TestCase

{
    use WithoutMiddleware;

    public function testRegister()
    {
        $value = [
            'name' => 'Marcel',
            'email' => 'marcel@gmail.com',
            'password' => '654321',
        ];

        $this
            ->post(route('api.register'), $value)
            ->assertStatus(201);
    }

    public function testLogin()
    {
        $value = [
            'email' => 'marcel@gmail.com',
            'password' => '654321',
        ];

        $this
            ->post(route('api.login'), $value)
            ->assertStatus(200);
    }
}
