<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){

        $news = News::paginate(8);
        return view('news', ['news' => $news]);
    }

    public function detail($id){
        $news = News::findOrFail($id);

        $others = News::inRandomOrder()->take(6)->get();


        return view('news_inner',['news'=>$news, 'others' => $others]);
    }
}
