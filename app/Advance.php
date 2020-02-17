<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'payable_amount', 'deposit_date', 'deposit_amount', 'due_amount', 'comments'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
