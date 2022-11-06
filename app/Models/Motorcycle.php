<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;
    protected $collection = 'motorcycles';
    protected $fillable = [
        'mesin',
        'tipe_suspensi',
        'tipe_transmisi',
        'vehicle_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', '_id');
    }
}
