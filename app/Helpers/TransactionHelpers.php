<?php


namespace App\Helpers;


use App\Transactions;
use App\User;
use Carbon\Carbon;

class TransactionHelpers
{
    public static function setTransaction(array $data, $reference) {
        $user                   = User::find($data['user_id']);
        $user_name              = $user->name;

        $transaction                    = array();
        $transaction['user_id']         = $data['user_id'];
        $transaction['user_name']       = $user_name;
        $transaction['transaction_date']= Carbon::now()->toDateString();
        $transaction['payable_amount']  = $data['payable_amount'];
        $transaction['deposit_amount']  = $data['deposit_amount'];
        $transaction['due_amount']      = $data['payable_amount'] - $data['deposit_amount'];
        $transaction['reference']       = $reference;

        Transactions::create($transaction);
    }
}
