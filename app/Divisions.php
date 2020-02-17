<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisions extends Model
{
    /**
     * @var array
     */
    protected $fillable = [

        'name', 'bn_name'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function district()
    {
        return $this->hasMany('App\Districts');
    }
}
