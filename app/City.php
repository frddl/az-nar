<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    public function sellingPoints(){
        return $this->hasMany(SellingPoint::class);
    }

    public function transactionDetail(){
        return $this->belongsTo(TransactionDetails::class);
    }
}
