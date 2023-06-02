<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class vehicle extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'laptop';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manufacturer', 'series', 'releaseYear', 'color', 'price', 'stock'
    ];
}
