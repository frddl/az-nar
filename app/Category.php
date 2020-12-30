<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    public  $translatable = ['name'];

    protected $with = ['subCategories'];

    public function subCategories(){
        return $this->hasMany(SubCategory::class);
    }

    public function products(){
        return $this->hasManyThrough(Product::class, SubCategory::class);
    }

    public function sortedProducts($column = 'created_at', $direction = 'desc'){
        return $this->products()->orderBy($column, $direction);
    }
}
