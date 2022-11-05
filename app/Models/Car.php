<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $collection = 'cars';
    protected $fillable = [
        'mesin',
        'kapasitas_penumpang',
        'tipe',
        'vehicle_id',
    ];
}
