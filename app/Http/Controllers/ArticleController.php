<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function view()
    {
        $articles = Article::paginate(6);
        return view('articles',['articles' =>$articles]);
    }
}
