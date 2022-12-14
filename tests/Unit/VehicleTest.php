<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class VehicleTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetAll()
    {
        // $this->assertTrue(true);
        $this
            ->get(route('api.vehicle.index'))
            ->assertStatus(200);
    }

    public function testGetSingle()
    {
        $id = '636905a7860c00005c001b4e';

        $this
            ->get(route('api.vehicle.find', $id))
            ->assertStatus(200);
    }

    public function testStore()
    {
        $value = [
            'tahun_kendaraan' => '1892',
            'warna' => 'Jingga',
            'harga' => '1500',
        ];

        $this
            ->post(route('api.vehicle.store'), $value)
            ->assertStatus(201);
    }

    public function testUpdate()
    {
        $id = '636905a7860c00005c001b4e';
        $value = [
            'tahun_kendaraan' => '1234',
            'warna' => 'RGB',
            'harga' => '99000',
            '_method' => 'PUT',
        ];

        $this
            ->post(route('api.vehicle.update', $id), $value)
            ->assertStatus(200);
    }

    public function testDestroy()
    {
        $id = '636907d5d37d00009f002db4';
        $this
            ->delete(route('api.vehicle.destroy', $id))
            ->assertStatus(200);
    }
}
