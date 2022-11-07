<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class CarTest extends TestCase
{
    use WithoutMiddleware;

    public function testGetAll()
    {
        // $this->assertTrue(true);
        $this
            ->get(route('api.car.index'))
            ->assertStatus(200);
    }

    public function testGetSingle()
    {
        $id = '63690378860c00005c001b49';

        $this
            ->get(route('api.car.find', $id))
            ->assertStatus(200);
    }

    public function testStore()
    {
        $value = [
            'mesin' => 'okesip',
            'kapasitas_penumpang' => '1',
            'tipe' => 'xpopo',
            'vehicle_id' => '63690331860c00005c001b48',
        ];

        $this
            ->post(route('api.car.store'), $value)
            ->assertStatus(201);
    }

    public function testUpdate()
    {
        $id = '63690378860c00005c001b49';
        $value = [
            'mesin' => 'okesip',
            'kapasitas_penumpang' => '1',
            'tipe' => '1500',
            'vehicle_id' => '63690331860c00005c001b48',
            '_method' => 'PUT',
        ];

        $this
            ->post(route('api.car.update', $id), $value)
            ->assertStatus(200);
    }

    public function testDestroy()
    {
        $id = '636907d4d37d00009f002db2';
        $this
            ->delete(route('api.car.destroy', $id))
            ->assertStatus(200);
    }
}
