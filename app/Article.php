<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Article extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $table = 'articles';

    public $translatable = ['name', 'title', 'text'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('main')
            ->singleFile();
    }
}
