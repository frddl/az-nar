<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Share extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = ['text','name'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function transactionDetail(){
        return $this->morphOne(TransactionDetails::class, 'ordable','transaction_detail_type', 'transaction_detail_id');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('main')
            ->singleFile();
    }
}
