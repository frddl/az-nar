<?php

namespace App\Http\Controllers;

use App\City;
use App\Product;
use App\Share;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function pay(Request $request){

        $validate = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'name' => ['required'],
            'mob_phone' =>['required'],
            'address' => ['required_without:user_address'],
            'user_address' => ['required_without:address'],
            'date' => ['required'],
        ]);

        if ($validate->fails())
        {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $transacrionTotal = 0;
        $transaction = Transaction::create(['user_id' => Auth::id() ?? null]);


        if (\request()->session()->has('products'))
        {
            $result = Session::get('products');
            $products = Product::whereIn('id', array_keys($result))->get();

            foreach ($products as $product)
            {
                $data = [
                    'transaction_id' => $transaction->id,
                    'product_name' => 'name',
                    'price' => $result[$product->id]['price'],
                    'count' => $result[$product->id]['count'],
                    'user_name' => $request->name,
                    'email' => $request->email,
                    'mob_phone' => $request->mob_phone,
                    'home_phone' => $request->home_phone,
                    'city_id' => $request->city,
                    'address' => $request->address." ".$request->home_namber." ".$request->apartment_number,
                    'comment' => $request->comment,
                    'date' => $request->date,
                    'pay_type' => $request->pay_type,
                    'total_price' => (float)($result[$product->id]['price'] * $result[$product->id]['count'])
                ];

                $transacrionTotal += (float)($result[$product->id]['price'] * $result[$product->id]['count']);
                $product->transactionDetail()->create($data);
            }


        }

        if (\request()->session()->has('shares'))
        {
            $result = Session::get('shares');
            $products = Share::whereIn('id', array_keys($result))->get();

            foreach ($products as $product)
            {
                $data = [
                    'transaction_id' => $transaction->id,
                    'product_name' => 'name',
                    'price' => $result[$product->id]['price'],
                    'count' => $result[$product->id]['count'],
                    'user_name' => $request->name,
                    'email' => $request->email,
                    'mob_phone' => $request->mob_phone,
                    'home_phone' => $request->home_phone,
                    'city_id' => $request->city,
                    'address' => $request->address." ".$request->home_namber." ".$request->apartment_number,
                    'comment' => $request->comment,
                    'date' => $request->date,
                    'pay_type' => $request->pay_type,
                    'total_price' => (float)($result[$product->id]['price'] * $result[$product->id]['count'])
                ];

                $transacrionTotal += (float)($result[$product->id]['price'] * $result[$product->id]['count']);
                $product->transactionDetail()->create($data);
            }
        }

        $transaction->total = $transacrionTotal;
        $transaction->save();

        return view('success');
    }

    public function getForm(){
        $total = 0;

        if (\request()->session()->has('products'))
        {
            foreach (Session::get('products') as $item) {
                $total += ($item['price'] * $item['count']);
            }
        }

        if (\request()->session()->has('shares'))
        {
            foreach (Session::get('shares') as $item) {
                $total += ($item['price'] * $item['count']);
            }
        }

        $cities = City::all();

        return view('purchase_reg', ['cities'=>$cities, 'total' => $total]);
    }
}
