<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Product;
use App\Sale;
use App\Share;
use App\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Ramsey\Collection\Tool\TypeTrait;

class ProductController extends Controller
{
    public function newProducts(){
        $products = Product::orderBy('created_at','desc')->doesntHave('sale')->where('is_new',true)->paginate(8);
        $categories = Category::all();
        return view('new_products',['products'=>$products, 'categories' => $categories]);
    }

    public function basket(){
        $products = [];
        $productCart = [];
        $shares = [];
        $shareCart = [];
        $total = 0;
        if (\request()->session()->has('products')){
            $productCart = Session::get('products');
            $products = Product::whereIn('id', array_keys($productCart))->get();
            foreach ($productCart as $r){
                $total += ($r['price'] * $r['count']);
            }
        }

        if (\request()->session()->has('shares')){
            $shareCart = Session::get('shares');

            $shares = Share::whereIn('id', array_keys($shareCart))->get();
            foreach ($shareCart as $r){
                $total += ($r['price'] * $r['count']);
            }
        }
        return view('basket', ['products'=>$products, 'shares'=>$shares,'productCart'=>$productCart, 'shareCart'=>$shareCart,'total' => $total]);
    }

    public function addToCard($id = null,Request $request){

        if ($id){
            session(['products.' . $id => [
                'price' => (float)$request->price,
                'count' => (float)$request->count,
            ]]);

            return redirect()->back();
        }

        $prevCount = session('products.' . $request->productId . '.count', 0);
        $currCount = $request->get('count', 1);
        $product = Product::where('id', $request->productId)->first();
        $price = $product->sale ? $product->sale->new_price : $product->price;



        session(['products.' . $request->productId => [
            'price' => $price,
            'count' => $prevCount + $currCount,
        ]]);

        $result = Session::get('products');

        $products = Product::whereIn('id', array_keys($result))->get();
        return redirect()->back();
    }

    public function removeCart($id){

        Session::forget("products.$id");

        return redirect()->back();
    }

    public function all(){
        $products = Product::all();

        return view('products',['products' => $products]);
    }

    public function detail($id){
        $product = Product::with('reviews')->findOrFail($id);

        $similarProducts = Product::where(function (\Illuminate\Database\Eloquent\Builder $query) use($product){
            $query->where('sub_category_id',$product->sub_category_id);
        })->take(4)->get();

        return view('product_inner',['product' => $product, 'similarProducts' => $similarProducts]);
    }

    public function productReview($id, Request $request){
        $product = Product::findOrFail($id);

        $rules = ['text' => 'required'];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }

        $product->reviews()->create([
            'user_id'=>Auth::id(),
            'text' =>$request->text,
            'product_id' =>$id,
            'rating' => $request->rating,
        ]);

        return redirect()->back();

    }

    public function allByCategory($id){
        $category = Category::with('sortedProducts')->findOrFail($id);
        $products = $category->sortedProducts()->paginate(6);
        return view('products_by_category',['category' => $category,'products' => $products]);
    }

    public  function allBySubCategory($id, $subId){
        $subCategories = Category::find($id);

        $products = SubCategory::findOrFail($subId)->products()->paginate(2);
        return view('products_by_sub_category',['data' => $subCategories,'products'=>$products]);
    }


}
