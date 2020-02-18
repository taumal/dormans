<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    /**
     * @var array
     */
    protected $fillable = [

        'seat_rent', 'net_bill', 'electric_bill', 'water_bill', 'gas_bill', 'bua_bill', 'care_taker', 'extra_utility', 'current_date', 'month_name', 'year',

    ];
}
