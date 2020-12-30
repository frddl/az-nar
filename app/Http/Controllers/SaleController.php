<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function all(){

        $sales = Product::has('sale')->paginate(8);
//        return $sales;
        return view('sales_products',['sales' => $sales]);
    }

}
