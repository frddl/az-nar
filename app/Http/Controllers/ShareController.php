<?php

namespace App\Http\Controllers;

use App\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShareController extends Controller
{
    public function all()
    {
        $shares = Share::latest()->get();
        return view('shares_products', ['shares' => $shares]);
    }

    public function addToCart($id = null, Request $request){

        if ($id){
//            return $request->all();
            session(['shares.' . $id => [
                'price' => (float)$request->price,
                'count' => (int)$request->count,
            ]]);
            return redirect()->back();
        }

        $prevCount = session('shares.' . $request->shareId . '.count', 0);
        $currCount = $request->get('count', 1);
        $share = Share::where('id', $request->shareId)->first();
        $price =$share->price;



        session(['shares.' . $request->shareId => [
            'price' => $price,
            'count' => $prevCount + $currCount,
        ]]);
        return redirect()->back();
    }

    public function removeCart($id)
    {
        Session::forget("shares.$id");

        return redirect()->back();
    }

    public function detail($id)
    {
        $share = Share::findOrFail($id);


        return view('share_inner',['share'=>$share]);
    }
}
