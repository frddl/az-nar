<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellingPointsController extends Controller
{
    public function index(){
        return view('selling_points');
    }
}
