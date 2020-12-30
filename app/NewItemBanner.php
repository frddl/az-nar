<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class NewItemBanner extends Model implements HasMedia
{
    use InteractsWithMedia, HasTranslations;

    protected $table = 'new_item_banner';

    public $translatable = ['text','button_name'];


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('main')
            ->singleFile();
    }
}
