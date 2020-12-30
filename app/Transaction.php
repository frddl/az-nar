<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = ['user_id'];

    protected $with = ['transactionDetails'];

    public function transactionDetails(){
        return $this->hasMany(TransactionDetails::class);
    }
}
