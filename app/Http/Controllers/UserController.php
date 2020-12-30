<?php

namespace App\Http\Controllers;

use App\Address;
use App\Favorites;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        $data = Transaction::where('user_id', $user->id)->get();
        return view('my_profile',['data' => $data, 'user'=>$user]);
    }

    public function purchases(){

        $user = Auth::user();
        $data = Transaction::where('user_id', $user->id)->get();

        return view('my_purchase',['data' => $data, 'user'=>$user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $vaidate = Validator::make($request->all(),[
            'name' => ['required'],
            'surname' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'birthday' => ['required'],
        ]);

        if ($vaidate->fails())
        {
            return redirect()->back()->withErrors($vaidate);
        }


        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->save();

        foreach ($request->addresses as $a)
        {
            Address::find(array_key_last($a))->update([
                'address' => $a[array_key_last($a)],
            ]);
        }

        if ($request->add_address){
            Auth::user()->addresses()->createMany($request->add_address);
        }

        return redirect()->back();
    }

    public function wishList()
    {
        return view('wishlist');
    }

    public function addToWishlist(Request $request){
        $action = 0;
        if (!Auth::user()->favorites->contains($request->id)){
            Auth::user()->favorites()->attach($request->id);
            $action = 1;
        } else {
            Auth::user()->favorites()->detach($request->id);
        }
        return response()->json(['success' => 'success', 'action' => $action, 'count'=> Auth::user()->favorites()->count()], 200);
    }
}
