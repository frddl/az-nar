<?php

namespace App\Providers;

use App\Category;
use App\DiscountBanner;
use App\NewItemBanner;
use App\News;
use App\Product;
use App\Review;
use App\Sale;
use App\Share;
use App\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \view()->composer(['layouts.main_banner_cats'], function ($view){
            $view->with('site_bar', Category::all());
        });

        \view()->composer(['layouts.header'], function ($view){
            $productCount = 0;
            if (request()->session()->has('products')) $productCount = count(Session::get('products'));

            $sharesCount = 0;
            if (request()->session()->has('shares')) $sharesCount = count(Session::get('shares'));

            $cartCount = $productCount + $sharesCount;

           $view->with('cartCount', $cartCount);
        });

        \view()->composer(['index'], function ($view){
            $view->with('new_products', Product::orderBy('created_at','desc')->doesntHave('sale')->take(8)->get());
        });

        view()->composer(['index'], function ($view){
           $view->with('shares', Share::all());
        });

        \view()->composer(['index'], function ($view){
            $view->with('discount_banner', DiscountBanner::all());
        });

        \view()->composer(['index'], function ($view){
            $view->with('new_item_banner', NewItemBanner::first());
        });

        \view()->composer(['index'], function ($view){
            $view->with('sliders', Slider::all());
        });

        \view()->composer(['index'], function ($view){
            $view->with('sales', Sale::all());
        });

        \view()->composer(['index'], function ($view){
            $view->with('news', News::latest()->get());
        });

        \view()->composer(['index'], function ($view){

            $view->with('reviews', Review::whereNull('product_id')->latest()->get());
        });
    }
}
