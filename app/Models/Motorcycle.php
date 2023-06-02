<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Motorcycle extends Vehicle
{
    protected $connection = 'mongodb';
    protected $collection = 'motorcycle';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'machineNo', 'suspensionType', 'transmissionType'
    ];
}
