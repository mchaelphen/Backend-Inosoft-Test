<?php

namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Transaction extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'transaction';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transactionNo', 'vehicleId', 'paymentType', 'transactionStatus', 'price'
    ];

    CONST PAYMENT_CREDIT = 1; 
    CONST PAYMENT_CASH = 2;
    CONST TRX_ONGOING = 1;
    CONST TRX_DONE = 2;
}
