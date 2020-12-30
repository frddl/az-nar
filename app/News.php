<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class News extends Model implements HasMedia
{
    use InteractsWithMedia, HasTranslations;

    protected $table = 'news';

    public $translatable = ['title','text','name'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('main')
            ->singleFile();
    }
}
