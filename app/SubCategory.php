<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubCategory extends Model
{
    use HasTranslations;

    protected $table = 'sub_categories';

    public $translatable = ['name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class,'sub_category_id','id');
    }

    public function sortedProducts($column = 'created_at', $direction = 'desc'){
        return $this->products()->orderBy($column, $direction);
    }
}
