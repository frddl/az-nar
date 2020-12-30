<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasTranslations;
    use InteractsWithMedia;

    public $translatable = ['name','text'];

    protected $appends = ['is_wished'];

    public function getIsWishedAttribute(){
        $u = Auth::user();
        return ($u == null) ? false : $u->favorites->contains($this->id);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function newItemBanner (){
        return $this->hasOne(NewItemBanner::class);
    }

    public function share(){
        return $this->belongsTo(Share::class);
    }

    public function sale(){
        return $this->hasOne(Sale::class);
    }

    public function discountBanner(){
        return $this->hasOne(DiscountBanner::class);
    }

    public function favorites(){
        return $this->hasMany(Favorites::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class)->latest();
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
