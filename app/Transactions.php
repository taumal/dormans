<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'user_name', 'transaction_date', 'payable_amount', 'deposit_amount', 'due_amount', 'reference'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
