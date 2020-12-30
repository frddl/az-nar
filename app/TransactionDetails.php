<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{

    protected $table = 'transaction_details';

    protected $fillable = [
        'transaction_id','product_name', 'price', 'count', 'user_name', 'email', 'mob_phone', 'home_phone','city_id', 'address', 'comment','date', 'pay_type', 'total_price'
    ];

    protected $dates = ['date'];

    public function ordable(){
        return $this->morphTo('transaction_details','transaction_detail_type','transaction_detail_id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function city(){
        return $this->hasOne(City::class);
    }
}
