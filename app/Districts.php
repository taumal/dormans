<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    /**
     * @var array
     */
    protected $fillable = [

        'name', 'bn_name', 'division_id'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division()
    {
        return $this->belongsTo('App\Divisions');
    }
}
