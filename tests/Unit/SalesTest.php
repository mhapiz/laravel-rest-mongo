<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SalesTest extends TestCase
{
    use WithoutMiddleware;

    public function testGetStock()
    {
        // $this->assertTrue(true);
        $this
            ->get(route('api.sales.get-stock'))
            ->assertStatus(200);
    }

    public function testGetCars()
    {
        // $this->assertTrue(true);
        $this
            ->get(route('api.sales.get-cars'))
            ->assertStatus(200);
    }

    public function testGetMotorcycles()
    {
        // $this->assertTrue(true);
        $this
            ->get(route('api.sales.get-motorcycles'))
            ->assertStatus(200);
    }
}
