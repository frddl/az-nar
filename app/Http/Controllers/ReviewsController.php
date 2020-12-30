<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewsController extends Controller
{
    public function index(){
        $reviews = Review::whereNull('product_id')->latest()->take(4)->get();
        $reviewsCount = Review::all()->count();
        return view('reviews',['reviews' => $reviews, 'reviewsCount' =>$reviewsCount]);
    }

    public function indexAll(){
        $reviews = Review::whereNull('product_id')->latest()->get();

        return view('reviews_all', ['reviews' => $reviews]);
    }

    public function add(Request $request){

        $rules = ['text' => 'required'];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }

        if (Auth::check()){
            Review::create([
                'text' => $request->text,
                'user_id' => Auth::id(),
                'rating' => $request->rating,
            ]);

            return redirect()->back()->with('success', true);
        }
        else return "error";
    }
}
