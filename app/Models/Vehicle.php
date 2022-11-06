<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Vehicle extends Model
{
    use HasFactory;
    protected $collection = 'vehicles';
    protected $fillable = [
        'tahun_kendaraan',
        'warna',
        'harga',
    ];

    public function car()
    {
        return $this->hasMany(Car::class, 'vehicle_id', '_id');
    }

    public function motorcycle()
    {
        return $this->hasMany(Motorcycle::class, 'vehicle_id', '_id');
    }
}
