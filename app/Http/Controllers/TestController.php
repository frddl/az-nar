<?php

namespace App\Http\Controllers;

use App\Address;
use App\Product;
use App\Share;
use App\SubCategory;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function test1(Request $request){
//        $addresses =count(array_filter($request->address, function ($k) {return $k['address'] != null;})) ;
//       return $addresses;

        return view('news_inner');
    }
}
