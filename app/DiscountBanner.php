<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class DiscountBanner extends Model implements HasMedia
{
    use InteractsWithMedia, HasTranslations;

    protected $table = 'discount_banners';

    public  $translatable = ['text','button_name'];



    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('main')
            ->singleFile();
    }
}
