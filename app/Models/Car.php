<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Car extends Vehicle
{
    protected $connection = 'mongodb';
    protected $collection = 'car';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'machineNo', 'transmissionType', 'passangerSeat'
    ];
}
