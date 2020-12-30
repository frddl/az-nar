<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SellingPoint extends Model
{
    use HasTranslations;

    protected $table = 'selling_points';

    public $translatable = [
        'name','address'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
