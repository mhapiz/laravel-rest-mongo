<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class MotorcycleTest extends TestCase
{
    use WithoutMiddleware;

    public function testGetAll()
    {
        // $this->assertTrue(true);
        $this
            ->get(route('api.motorcycle.index'))
            ->assertStatus(200);
    }

    public function testGetSingle()
    {
        $id = '63690399860c00005c001b4b';

        $this
            ->get(route('api.motorcycle.find', $id))
            ->assertStatus(200);
    }

    public function testStore()
    {
        $value = [
            'mesin' => 'okesip',
            'tipe_suspensi' => 'Jingga',
            'tipe_transmisi' => '1500',
            'vehicle_id' => '63690327860c00005c001b47',
        ];

        $this
            ->post(route('api.motorcycle.store'), $value)
            ->assertStatus(201);
    }

    public function testUpdate()
    {
        $id = '63690399860c00005c001b4b';
        $value = [
            'mesin' => 'okesip',
            'tipe_suspensi' => 'RGB',
            'tipe_transmisi' => '99000',
            'vehicle_id' => '63690327860c00005c001b47',
            '_method' => 'PUT',
        ];

        $this
            ->post(route('api.motorcycle.update', $id), $value)
            ->assertStatus(200);
    }

    public function testDestroy()
    {
        $id = '636907d4d37d00009f002db3';
        $this
            ->delete(route('api.motorcycle.destroy', $id))
            ->assertStatus(200);
    }
}
