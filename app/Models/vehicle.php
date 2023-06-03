<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'vehicle';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manufacturer', 'series', 'releaseYear', 'numOfTires', 'machine', 
        'transmissionType', 'passengerSeat', 'color', 'price', 'stock'
    ];

    CONST MOTORCYCLE = 2;
    CONST CAR = 4;
}
