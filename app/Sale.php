<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sale extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $with = ['product'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('main')
            ->singleFile();
    }
}
